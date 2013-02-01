package nl.hanze.promagreader.threading;

import nl.hanze.promagreader.gui.*;

public class ThreadManager extends Thread {
	private In in;
	private KaartInit kaartinit;
	private InenOut inenout;
	private Betalen betalen;
	private long pollinterval;
	//private Decoder dec;
	
	public ThreadManager(In in, KaartInit kaartinit, InenOut inenout, Betalen betalen, long pollinterval) {
		this.in=in;
		this.kaartinit=kaartinit;
		this.inenout=inenout;
		this.betalen=betalen;
		this.pollinterval=pollinterval;
		//dec=new Decoder();
		start();
	}
	
	@Override
	public void run() {
		while(true) {
			try {
				String s=in.getBuffer();
				if(s!=null) { 
					if(kaartinit.actief) kaartinit.setText(s);
					if(inenout.actief) inenout.checkCard(s);
					if(betalen.actief) betalen.checkCard(s);
					//kaartinit.setID(dec.decodeLastValue(main.getText()));
				}
				Thread.sleep(pollinterval);
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}
}
