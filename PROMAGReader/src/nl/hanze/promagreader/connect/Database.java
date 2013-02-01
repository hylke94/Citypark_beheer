package nl.hanze.promagreader.connect;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class Database {
	
	private String dbUrl;
	private String user;
	private String password;
	private SimpleDateFormat df, dftime;
	
	public Database() {
		dbUrl = "jdbc:mysql://127.0.0.1/citypark";
		user = "root";
		password = "";
		df = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
		dftime = new SimpleDateFormat("HH:mm:ss");
		
	}
	
	public String getCardValue(int type, String rfid) {
		String query = null;
		switch(type) {
		case 0:		query = "SELECT WAARDE FROM pas WHERE PAS_TYPE=1 AND RFID='"+rfid+"'";
					break;
		case 1:		query = "SELECT KLANT_NR FROM pas WHERE PAS_TYPE=2 AND RFID='"+rfid+"'";
					break;	
		case 2:		query = "SELECT KLANT_NR FROM pas WHERE PAS_TYPE=3 AND RFID='"+rfid+"'";
					break;	
		case 3:		query = "SELECT PAS_ID FROM pas WHERE PAS_TYPE=4 AND RFID='"+rfid+"'";
					break;	
		
		}
		try{
		Class.forName("com.mysql.jdbc.Driver");
		Connection con = DriverManager.getConnection (dbUrl,user,password);
		Statement stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(query);
		
		if(!rs.next()) {
			return null;
		} else {
			return rs.getString(1);
		}
		
		
		}catch(Exception e) {System.out.println("Database: functie->getCardValue");System.err.println(e.getMessage());}
		
		return null;
	}
	
	public void insertCardValue(int type, String rfid, String waarde) {
		String query = null;
		switch(type) {
		case 0:		query = "INSERT INTO pas (PAS_TYPE, RFID, WAARDE) VALUES ("+1+", '"+rfid+"', '"+waarde+"')";
					break;
		case 1:		query = "INSERT INTO pas (PAS_TYPE, RFID, KLANT_NR) VALUES ("+2+", '"+rfid+"', '"+waarde+"')";
					break;	
		case 2:		query = "INSERT INTO pas (PAS_TYPE, RFID, KLANT_NR) VALUES ("+3+", '"+rfid+"', '"+waarde+"')";
					break;	
		case 3:		query = "INSERT INTO pas (PAS_TYPE, RFID) VALUES ("+4+", '"+rfid+"')";
					break;	
		
		}
		try {
		Class.forName("com.mysql.jdbc.Driver");
		Connection con = DriverManager.getConnection (dbUrl,user,password);
		Statement stmt = con.createStatement();
		
		stmt.executeUpdate(query);	
		
		
		}catch(Exception e) {System.out.println("Database: functie->insertCardValue");System.err.println(e.getMessage());}
		
	}
	
	public void updateCardValue(int type, String rfid, String waarde) {
		String query = null;
		switch(type) {
		case 0:		query = "UPDATE pas SET WAARDE='"+waarde+"' WHERE PAS_TYPE="+1+" AND RFID='"+rfid+"'";
					break;
		case 1:		query = "UPDATE pas SET KLANT_NR='"+waarde+"' WHERE PAS_TYPE="+2+" AND RFID='"+rfid+"'";
					break;	
		case 2:		query = "UPDATE pas SET KLANT_NR='"+waarde+"' WHERE PAS_TYPE="+3+" AND RFID='"+rfid+"'";
					break;	
		
		}
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			
			stmt.executeUpdate(query);	
			
			
			}catch(Exception e) {System.out.println("Database: functie->updateCardValue");System.err.println(e.getMessage());}
	}
	
	public int checkType(String rfid) {
		
		String query = "SELECT PAS_TYPE FROM pas WHERE RFID='"+rfid+"'";
		
		try{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			if(!rs.next()) {
				return 0;
			} else {
				int uit = rs.getShort(1);
				con.close();
				rs.close();
				return uit;
			}
			
			
			}catch(Exception e) {System.out.println("Database: functie->checkType");System.err.println(e.getMessage());}
		
		return 0;
	}
	
	public boolean checkCard(String rfid) {
		
		String query = "SELECT * FROM pas WHERE RFID='"+rfid+"'";
		
		try{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			if(!rs.next()) {
				return false;
			} else {
				if(rs.getShort(2) > 1) {
					if(rs.getShort(2) == 4 && rs.getString(6).equals("0000-00-00 00:00:00")) {
						checkIn(rfid);
						return true;
					}
					if(rs.getShort(7) == 1 && rs.getShort(2) == 3) {
						if(!rs.getString(6).equals("0000-00-00 00:00:00")) {
							checkOut(rfid, rs.getString(6));
						} else {
							checkIn(rfid);
						}
						return true;
					}
					if(rs.getShort(7) == 1 && rs.getShort(2) == 2) return true;
				} 
				
			}
			
			
			}catch(Exception e) {System.out.println("Database: functie->checkCard");System.err.println(e.getMessage());}
		
		return false;
	}
	
	private void checkIn(String rfid) {
		
		Date huidigetijd = Calendar.getInstance().getTime();
		String datum = df.format(huidigetijd);
		String query = "UPDATE pas SET INRIJDTIJD='"+datum+"' WHERE RFID='"+rfid+"'";
		
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			
			stmt.executeUpdate(query);	
			
			
			}catch(Exception e) {System.out.println("Database: functie->checkIn");System.err.println(e.getMessage());}
		
	}
	
	private void checkOut(String rfid, String tijd) {
		
		int credit = getWaarde(rfid);
		
		
		try {
			Date in = df.parse(tijd);
			Date uit = Calendar.getInstance().getTime();
			int parkeertijd = 0;
			
			long dif = uit.getTime() - in.getTime();
			Date diff = new Date(dif);
			
			parkeertijd = diff.getHours();
			
			credit = credit - parkeertijd;
			
			String query = "UPDATE pas SET WAARDE='"+credit+"', INRIJDTIJD='0000-00-00 00:00:00' WHERE RFID='"+rfid+"'";
			
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			
			stmt.executeUpdate(query);
			
		} catch (Exception e) {System.out.println("Database: functie->checkOut");System.err.println(e.getMessage());} 
		
		
	}
	
	public int getWaarde(String rfid) {
		
		String query = "SELECT WAARDE FROM pas WHERE RFID='"+rfid+"'";
		
		try{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			if(!rs.next()) {
				return 0;
			} else {
				return rs.getInt(1);
			}
			
			
			}catch(Exception e) {System.out.println("Database: functie->getWaarde");System.err.println(e.getMessage());}
		return 0;
	}
	
	public String getInRijdTijd(String rfid) {
		
		String query = "SELECT INRIJDTIJD FROM pas WHERE RFID='"+rfid+"'";
		
		try{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			if(!rs.next()) {
				rs.close();
				return null;
			} else {
				String uit = rs.getString(1);
				rs.close();
				return uit;
			}
			
			
			}catch(Exception e) {System.out.println("Database: functie->getInRijdTijd");System.err.println(e.getMessage());}
		return null;
	}
	
	public int getCatNr(String query) {
		
		try{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			if(!rs.next()) {
				return 0;
			} else {
				int uit = rs.getInt(1);
				con.close();
				rs.close();
				return uit;
			}
			
			
			}catch(Exception e) {System.out.println("Database: functie->getInRijdTijd");System.err.println(e.getMessage());}
		return 0;
	}
	
	public double calcPinBedrag(String rfid) {
		
		try{
		String starttijd = getInRijdTijd(rfid);
		String inrijtijd = starttijd.substring(0, 10);
		Date in = df.parse(starttijd);
		Date uit = Calendar.getInstance().getTime();
		Calendar cal = Calendar.getInstance();
		int catnr = 0;
		double bedrag = 0, tarief = 0;
		while(uit.getTime() >= in.getTime()) {
			
			cal.setTime(in);
			int startdag = cal.get(Calendar.DAY_OF_WEEK);
			int dagtype = 0;
			if(startdag > 0 && startdag < 6) dagtype = 1;
			if(startdag == 6) dagtype = 2;
			if(startdag == 7) dagtype = 3;
			
			String tijd = dftime.format(in);
			
			String query = "SELECT CAT_NR FROM tarieven WHERE INGANGSDATUM<='"+inrijtijd+"' AND DAG_ID='"+dagtype+"' AND STARTTIJD <='"+tijd+"' AND EINDTIJD >='"+tijd+"' ORDER BY INGANGSDATUM DESC";
			
			System.out.println(query);
			
			if(!(catnr == getCatNr(query))) {
				bedrag = bedrag + tarief;
				tarief = 0;
				catnr = getCatNr(query);
			}
			//System.out.println(query);
			
			query = "SELECT * FROM categorie WHERE ID='"+catnr+"'";
			
			Class.forName("com.mysql.jdbc.Driver");
			Connection con = DriverManager.getConnection (dbUrl,user,password);
			Statement stmt = con.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			
			rs.next();
			Date interval = dftime.parse(rs.getString(2));
			tarief = tarief + rs.getDouble(3);
			double max = rs.getDouble(4);
			
			con.close();
			
			if(tarief > max) tarief = max;
			
			long newtime = in.getTime() - interval.getTime();
			in = new Date(newtime);
				
		}//End of While
		if(tarief > bedrag) bedrag = tarief;
		return (double)Math.round(bedrag * 100) / 100;
        
		}catch(Exception e) {System.out.println("Database: functie->calcPinBedrag");System.err.println(e.getMessage());}
		
		
		return 0.00;
	}
	
}

