package nl.hanze.promagreader.gui;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.*;

@SuppressWarnings("serial")
public class AppSwitch extends JFrame implements ActionListener {
	
	private JLabel titel;
	private JButton kaartinit, inenout, betalen;
	private KaartInit kaart;
	private InenOut inout;
	private Betalen pay;
	private int count1 = 0, count2 = 0, count3 = 0;
	
	
	public AppSwitch(KaartInit kaart, InenOut inout, Betalen pay) {
		
		this.kaart=kaart;
		this.inout=inout;
		this.pay=pay;
		
		titel = new JLabel("AppSwitch", JLabel.CENTER);
		
		kaartinit = new JButton("KaartInit");
		kaartinit.addActionListener(this);
		
		inenout = new JButton("InenOut");
		inenout.addActionListener(this);
		
		betalen = new JButton("Betalen");
		betalen.addActionListener(this);
		
		setSize(150, 200);
		setVisible(true);
		setLayout(null);
		setResizable(false);
		
		getContentPane().add(titel);
		getContentPane().add(kaartinit);
		getContentPane().add(inenout);
		getContentPane().add(betalen);
		
		titel.setBounds(23, 5, 100, 30);
		kaartinit.setBounds(23, 55, 100, 30);
		inenout.setBounds(23, 90, 100, 30);
		betalen.setBounds(23, 125, 100, 30);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		
		if(e.getSource()==kaartinit) {
			if(count1==0){
			kaart.actief(true);
			inout.actief(false);
			pay.actief(false);
			count1=1;
			}else{
				kaart.actief(false);
				count1=0;
			}
			
		}
		if(e.getSource()==inenout) {
			if(count2==0){
			kaart.actief(false);
			inout.actief(true);
			pay.actief(false);
			count2=1;
			}else{
				inout.actief(false);
				count2=0;
			}
		}
		if(e.getSource()==betalen) {
			if(count3==0){
			kaart.actief(false);
			inout.actief(false);
			pay.actief(true);
			count3=1;
			}else{
				pay.actief(false);
				count3=0;
			}
		}
	}

}
