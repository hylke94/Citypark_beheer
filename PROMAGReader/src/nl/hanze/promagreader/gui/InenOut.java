package nl.hanze.promagreader.gui;

import java.awt.*;

import javax.swing.*;

import nl.hanze.promagreader.connect.Database;
import nl.hanze.promagreader.threading.*;

@SuppressWarnings("serial")
public class InenOut extends JFrame {

	private JPanel info;
	private JLabel mess, oranje, groen, rood;
	private int count = 0;
	private Out out;
	public boolean actief = false;
	private Database db = new Database();
	
	public InenOut(Out out) {
		
		info = new JPanel();
		info.setLayout(new GridBagLayout());
		info.setBorder(BorderFactory.createLineBorder(Color.black));
		info.setBackground(Color.gray);
		
		mess = new JLabel("Scan Pas!");
		mess.setForeground(Color.white);
		mess.setFont(new Font("Impact", Font.PLAIN , 18));
		
		info.add(mess);
				
		oranje = ImageToLabel("resources/oranje.png");
		groen = ImageToLabel("resources/groen.png");
		rood = ImageToLabel("resources/rood.png");
		
		this.out=out;
		setSize(300, 350);
		setVisible(false);
		setTitle("Ingang/Uitgang");
		setLayout(null);
		setResizable(false);
		getContentPane().add(info);
		getContentPane().add(oranje);
		getContentPane().add(groen);
		getContentPane().add(rood);
		
		info.setBounds(49, 50, 199, 75);
		oranje.setBounds(75, 150, 150, 150);
		groen.setBounds(75, 150, 150, 150);
		rood.setBounds(75, 150, 150, 150);

		oranje.setVisible(true);
		groen.setVisible(false);
		rood.setVisible(false);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		
	}
	
	public JLabel ImageToLabel(String input){
		
	final ImageIcon icon = new ImageIcon(input);

    JLabel label= new JLabel() {
      public void paintComponent(Graphics g) {
        g.drawImage(icon.getImage(), 0, 0, null);
        super.paintComponent(g);
      }
    };

    label.setOpaque(false);
    
    return label;
	}
	
	public void checkCard(String s) {
		count++;

			if(count==1) {
				String a = s.substring(0, 8);
				oranje.setVisible(false);
				if(db.checkCard(a)) { groen.setVisible(true); beep(true); }
				else { rood.setVisible(true); beep(false); }
				count++;
			}else{
				rood.setVisible(false);
				groen.setVisible(false);
				oranje.setVisible(true);
				count = 0;
			}
		
	}

	public void actief(boolean b) {
		if(b) {
			setVisible(true);
			actief = true;
			count = 0;
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
}
