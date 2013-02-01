package nl.hanze.promagreader.main;

import nl.hanze.promagreader.comm.*;
import nl.hanze.promagreader.gui.*;
import nl.hanze.promagreader.threading.*;
import gnu.io.*;

public class Main {
	private Comm comm;
	private CommSetting setting;
	private KaartInit kaartinit;
	private InenOut inenout;
	private Betalen betalen;
	@SuppressWarnings("unused")
	private AppSwitch appswitch;
	
	public Main() throws Exception {
		setting=new CommSetting("COM4", 9600, 
				SerialPort.DATABITS_8, SerialPort.STOPBITS_1,
				SerialPort.PARITY_NONE, SerialPort.FLOWCONTROL_NONE);
		comm=new Comm(setting);
		kaartinit=new KaartInit(comm.getOut());
		inenout = new InenOut(comm.getOut());
		betalen = new Betalen(comm.getOut());
		appswitch = new AppSwitch(kaartinit, inenout, betalen);
		new ThreadManager(comm.getIn(), kaartinit, inenout, betalen, 250L);
	}
	
	
}
