package nl.hanze.promagreader.gui;

import java.awt.event.*;
import java.awt.*;

import javax.swing.*;

import nl.hanze.promagreader.connect.Database;
import nl.hanze.promagreader.threading.*;

@SuppressWarnings("serial")
public class KaartInit extends JFrame implements ActionListener{

	@SuppressWarnings("rawtypes")
	private JComboBox invoer;
	private JLabel reknr, abonr, adhoc, rffield;
	private JButton opslaan, toevoegen;
	private JSeparator line;
	private JTextField waarde, rfid;
	private Out out;
	private int count = 0;
	public boolean actief = false;
	private Database db = new Database();
	
	
	@SuppressWarnings({ "rawtypes", "unchecked" })
	public KaartInit(Out out) {
		
		invoer = new JComboBox();
		invoer.addActionListener(this);
		adhoc = new JLabel("Adhoc kaart toevoegen.");
		reknr = new JLabel("Rek.nr:");
		waarde = new JTextField();
		abonr = new JLabel("Abo.nr:");
		opslaan = new JButton("Opslaan");
		opslaan.addActionListener(this);
		toevoegen = new JButton("Toevoegen");
		toevoegen.addActionListener(this);
		line = new JSeparator();
		line.setForeground(Color.black);
		line.setOrientation(SwingConstants.HORIZONTAL);
		rffield = new JLabel("RFID:");
		rfid = new JTextField("Geen kaart !");
		rfid.setEditable(false);
		
		invoer.addItem("Bankpas");
		invoer.addItem("Abonneepas");
		invoer.addItem("Bezoekerspas");
		invoer.addItem("Ad-hoc pas");
		
		this.out=out;
		setSize(300, 350);
		setVisible(false);
		setTitle("Kaart Initialisatie");
		setLayout(null);
		setResizable(false);
		getContentPane().add(invoer);
		getContentPane().add(adhoc);
		getContentPane().add(reknr);
		getContentPane().add(waarde);
		getContentPane().add(abonr);
		getContentPane().add(opslaan);
		getContentPane().add(toevoegen);
		getContentPane().add(line);
		getContentPane().add(rffield);
		getContentPane().add(rfid);
		
		invoer.setBounds(0, 0, 295, 30);
		adhoc.setBounds(10, 50, 250, 30);
		reknr.setBounds(10, 50, 50, 30);
		waarde.setBounds(60, 50, 150, 30);
		abonr.setBounds(10, 50, 50, 30);
		opslaan.setBounds(60, 85, 150, 30);
		toevoegen.setBounds(60, 85, 150, 30);
		line.setBounds(0, 295, 295, 5);
		rffield.setBounds(10, 300, 50, 20);
		rfid.setBounds(60, 300, 150, 20);
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		try {
			int value = invoer.getSelectedIndex();
			
			if (e.getSource()==opslaan) {
				if(count%2 !=0 && count > 0) {
					if(waarde.getText().equals("")) showError("Er is geen waarde ingevuld!");
					else {
						if(db.checkType(rfid.getText()) == 0) {
							db.insertCardValue(value, rfid.getText(), waarde.getText());
							showSucces("Kaart met succes gekoppeld!");
						}else{
							if(db.checkType(rfid.getText()) == value+1) {
								db.updateCardValue(value, rfid.getText(), waarde.getText());
								showSucces("Kaart met succes geupdate!");
							} else {
								showError("Verkeerde type kaart!");
							}
						}
						
					}
				} else {
					showError("Er is geen kaart ingelezen!");
				}
			}
			if(e.getSource()==toevoegen) {
				if(count%2 !=0 && count > 0) {
					if(db.checkType(rfid.getText()) == 0) {
						db.insertCardValue(value, rfid.getText(), waarde.getText());
						showSucces("Adhoc toegevoegd!");
					} else {
						showError("Kaart is al toegevoegd!");
					}
					
					
				} else {
					showError("Er is geen kaart ingelezen!");
				}
				
			}
			
			if(value == 0) { //Bankpas
				reknr.setVisible(true);
				waarde.setVisible(true);
				abonr.setVisible(false);
				adhoc.setVisible(false);
				opslaan.setVisible(true);
				toevoegen.setVisible(false);
				waarde.setText(null);
				
			}
			if(value == 1) { //Aboneepas
				abonr.setVisible(true);
				reknr.setVisible(false);
				waarde.setVisible(true);
				adhoc.setVisible(false);
				opslaan.setVisible(true);
				toevoegen.setVisible(false);
				waarde.setText(null);
			}
			if(value == 2) { //Bezoekerspas
				abonr.setVisible(true);
				reknr.setVisible(false);
				waarde.setVisible(true);
				adhoc.setVisible(false);
				opslaan.setVisible(true);
				toevoegen.setVisible(false);
				waarde.setText(null);
			}
			if(value == 3) { //Ad-hoc pas
				reknr.setVisible(false);
				waarde.setVisible(false);
				abonr.setVisible(false);
				adhoc.setVisible(true);
				opslaan.setVisible(false);
				toevoegen.setVisible(true);
				waarde.setText(null);
			}
			
		} catch(Exception ex) {
			ex.printStackTrace();
		}
		
	}
	
	private void showError(String s) {
		try {
			out.beeps();
		} catch (Exception e) {
			e.printStackTrace();
		}
		JOptionPane.showMessageDialog(new JFrame(),s,"Fout!",JOptionPane.ERROR_MESSAGE);
	}

	private void showSucces(String s) {
		try {
			out.beep();
		} catch (Exception e) {
			e.printStackTrace();
		}
		JOptionPane.showMessageDialog(new JFrame(),s);
	}
	
	public void setText(String s) {
		rfid.setText(s);
		count++;
		if(count%2 !=0 && count >0) {
			String a = s.substring(0, 8);
			rfid.setText(a);
			waarde.setText(db.getCardValue(invoer.getSelectedIndex(), a));
		}
		else waarde.setText(null);
		
	}
	
	public void actief(boolean b) {
		if(b) {
			setVisible(true);
			actief = true;
			waarde.setText(null);
			count = 0;
		}else{
			setVisible(false);
			actief = false;
		}
	}
}
