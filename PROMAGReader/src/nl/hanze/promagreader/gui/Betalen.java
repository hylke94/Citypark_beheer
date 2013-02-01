package nl.hanze.promagreader.gui;
import java.awt.event.*;
import java.awt.*;

import javax.swing.*;

import nl.hanze.promagreader.connect.BankservicewsdlPortType;
import nl.hanze.promagreader.connect.Database;
import nl.hanze.promagreader.threading.*;

@SuppressWarnings("serial")
public class Betalen extends JFrame implements ActionListener{

	private JPanel info;
	private JLabel mess, bedrag;
	private JTextField value;
	private JButton b1,b2,b3,b4,b5,b6,b7,b8,b9,b0,cor,stop;
	private int count = 1;
	private double betalen;
	private Out out;
	public boolean actief = false;
	private boolean card = true;
	private int banknr;
	private StringBuilder code = new StringBuilder("    ");
	private int index = 0;
	private Database db = new Database();
	private BankservicewsdlPortType soap;
	
	public Betalen(Out out) {
		
		info = new JPanel();
		info.setLayout(new GridBagLayout());
		info.setBorder(BorderFactory.createLineBorder(Color.black));
		info.setBackground(Color.gray);
		
		mess = new JLabel("Parkeerkaart   AUB !");
		mess.setForeground(Color.white);
		mess.setFont(new Font("Impact", Font.PLAIN , 18));
		
		info.add(mess);
		
		bedrag = new JLabel("Te betalen:");
		
		value = new JTextField();
		value.setEditable(false);
		
		b1 = new JButton("1");
		b1.setFont(new Font("Impact", Font.PLAIN , 18));
		b1.addActionListener(this);
		b2 = new JButton("2");
		b2.setFont(new Font("Impact", Font.PLAIN , 18));
		b2.addActionListener(this);
		b3 = new JButton("3");
		b3.setFont(new Font("Impact", Font.PLAIN , 18));
		b3.addActionListener(this);
		b4 = new JButton("4");
		b4.setFont(new Font("Impact", Font.PLAIN , 18));
		b4.addActionListener(this);
		b5 = new JButton("5");
		b5.setFont(new Font("Impact", Font.PLAIN , 18));
		b5.addActionListener(this);
		b6 = new JButton("6");
		b6.setFont(new Font("Impact", Font.PLAIN , 18));
		b6.addActionListener(this);
		b7 = new JButton("7");
		b7.setFont(new Font("Impact", Font.PLAIN , 18));
		b7.addActionListener(this);
		b8 = new JButton("8");
		b8.setFont(new Font("Impact", Font.PLAIN , 18));
		b8.addActionListener(this);
		b9 = new JButton("9");
		b9.setFont(new Font("Impact", Font.PLAIN , 18));
		b9.addActionListener(this);
		b0 = new JButton("0");
		b0.setFont(new Font("Impact", Font.PLAIN , 18));
		b0.addActionListener(this);
		cor = new JButton("COR");
		cor.setFont(new Font("Impact", Font.PLAIN , 8));
		cor.addActionListener(this);
		cor.setBackground(Color.YELLOW);
		stop = new JButton("STOP");
		stop.setFont(new Font("Impact", Font.PLAIN , 8));
		stop.addActionListener(this);
		stop.setBackground(Color.RED);
		
		this.out=out;
		setSize(300, 400);
		setVisible(false);
		setTitle("Betaal Terminaal");
		setLayout(null);
		setResizable(false);
		getContentPane().add(info);
		getContentPane().add(bedrag);
		getContentPane().add(value);
		getContentPane().add(b1);
		getContentPane().add(b2);
		getContentPane().add(b3);
		getContentPane().add(b4);
		getContentPane().add(b5);
		getContentPane().add(b6);
		getContentPane().add(b7);
		getContentPane().add(b8);
		getContentPane().add(b9);
		getContentPane().add(b0);
		getContentPane().add(cor);
		getContentPane().add(stop);		
		
		info.setBounds(24, 20, 249, 75);
		bedrag.setBounds(25, 100, 70, 30);
		value.setBounds(95, 100, 105, 30);
		b1.setBounds(70, 140, 50, 50);
		b2.setBounds(125, 140, 50, 50);
		b3.setBounds(180, 140, 50, 50);
		b4.setBounds(70, 195, 50, 50);
		b5.setBounds(125, 195, 50, 50);
		b6.setBounds(180, 195, 50, 50);
		b7.setBounds(70, 250, 50, 50);
		b8.setBounds(125, 250, 50, 50);
		b9.setBounds(180, 250, 50, 50);
		cor.setBounds(70, 305, 50, 50);
		b0.setBounds(125, 305, 50, 50);
		stop.setBounds(180, 305, 50, 50);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}
	
	
	
	
	@Override
	public void actionPerformed(ActionEvent e) {
		if(count == 3 && index !=4) {
			if(e.getSource()==b1) {
				beep(true);
				code.setCharAt(index, '1');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b2) {
				beep(true);
				code.setCharAt(index, '2');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b3) {
				beep(true);
				code.setCharAt(index, '3');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b4) {
				beep(true);
				code.setCharAt(index, '4');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b5) {
				beep(true);
				code.setCharAt(index, '5');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b6) {
				beep(true);
				code.setCharAt(index, '6');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b7) {
				beep(true);
				code.setCharAt(index, '7');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b8) {
				beep(true);
				code.setCharAt(index, '8');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b9) {
				beep(true);
				code.setCharAt(index, '9');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==b0) {
				beep(true);
				code.setCharAt(index, '0');
				index++;
				if(index == 4) SoapClient();//Roep soapclient aan voor controle
			}
			if(e.getSource()==cor) {
				beep(false);
				index = 0;
			}
						
		}
		if(e.getSource()==stop) {
			beep(false);
			index = 0;
			count = 1;
			mess.setText("Parkeerkaart   AUB !");
			betalen = 0;
			value.setText("");
		}
		
	}
	
	public void checkCard(String s) {
		
		String rfid = null;
		if(card) { rfid = s.substring(0, 8); beep(true); }
		
		if(count==1 && card) {
			if(db.checkType(rfid) == 4) {
				betalen = db.calcPinBedrag(rfid);
				value.setText("€ "+betalen);
				mess.setText("Plaats   Bankpas  AUB !");
				count++;
			} else {
				beep(false);
			}
		}
		if(count==2 && card) {
			if(db.checkType(rfid) == 1) {
				banknr = db.getWaarde(rfid);
				mess.setText("Voer  uw  pincode  in !");
				count++;
			}
			
		}
		
		if(card) card = false;
		else card = true;
	}
	
	public void actief(boolean b) {
		if(b) {
			setVisible(true);
			actief = true;
			count = 1;
			betalen = 0;
			index = 0;
			bedrag.setText("");
			mess.setText("Parkeerkaart   AUB !");
		}else{
			setVisible(false);
			actief = false;
		}
	}

	public void beep(boolean b) {
		
		try {
			if(b)out.beep();
			else out.beeps();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	private void SoapClient() {
		int pin = Integer.parseInt(code.toString());
		int rek = banknr;
		System.out.println("Rekening nummer: "+rek);
		System.out.println("Pincode: "+pin);
		/*if(!soap.doCreditCheck(rek, betalen)) mess.setText("Betaling mislukt!");
		if(!soap.transfer(rek, 100000, betalen, pin)) mess.setText("Betaling mislukt!");
		else*/ mess.setText("Betaling gelukt!");
	}
}
