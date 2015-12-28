package pakete;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JLabel;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

import javax.swing.ButtonGroup;
import javax.swing.ButtonModel;
import javax.swing.JTextField;
import javax.swing.JRadioButton;
import javax.swing.JComboBox;
import javax.swing.JTextArea;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

public class InterfazeProba extends JFrame {
//NErea
	
	private JPanel contentPane;
	private JTextField sartuIzena;
	private ButtonGroup taldea;
	private JRadioButton emakumea;
	private JRadioButton gizona;
	private JLabel labelJaiotze;
	private JButton botoia;
	private JComboBox konbo;
	private final JTextArea testua;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					InterfazeProba frame = new InterfazeProba();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public InterfazeProba() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		setTittle("Titulua");
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JLabel labelIzena = new JLabel("Izena:");
		labelIzena.setBounds(26, 12, 70, 15);
		contentPane.add(labelIzena);
		
		sartuIzena = new JTextField();
		sartuIzena.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				sartuIzena.setBackground(new Color(255,255,255));
				testua.setText("");
			}
		});
		sartuIzena.setBounds(103, 10, 203, 19);
		contentPane.add(sartuIzena);
		sartuIzena.setColumns(10);
		
		JLabel labelSexua = new JLabel("Sexua:");
		labelSexua.setBounds(26, 55, 70, 15);
		contentPane.add(labelSexua);
		
		emakumea = new JRadioButton("Emakumea");
		emakumea.setBounds(92, 51, 149, 23);
		contentPane.add(emakumea);
		
		gizona = new JRadioButton("Gizona");
		gizona.setBounds(92, 84, 149, 23);
		contentPane.add(gizona);
		
		taldea=new ButtonGroup();
		taldea.add(gizona);
		taldea.add(emakumea);
		
		labelJaiotze = new JLabel("Jaiotze urtea:");
		labelJaiotze.setBounds(12, 120, 97, 15);
		contentPane.add(labelJaiotze);
		
		konbo = new JComboBox();
		konbo.setMaximumRowCount(2000);
		konbo.setBounds(122, 115, 97, 24);
		contentPane.add(konbo);
		for(int i=1900;i<2010;i++)
		konbo.addItem(i);
		
		testua = new JTextArea();
		testua.setBounds(22, 152, 405, 92);
		contentPane.add(testua);
		
		botoia = new JButton("Datuak bidali");
		botoia.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				String izena=sartuIzena.getText();
				Integer urtea=(Integer)konbo.getSelectedItem();
				ButtonModel bm=taldea.getSelection();
				String sexua="";
				Color gorri=new Color(255,0,0);
				if(bm==gizona.getModel()){sexua="gizona";}
				else if(bm==emakumea.getModel()){sexua="emakumea";}
				
				if(izena.equals("")){testua.setText("Sartu zure izena");
				sartuIzena.setBackground(gorri);
				
				
				
				
				
				}
				else{testua.setText("Zure datuak heldu dira:\nIzena: "+izena+"\nSexua: "+sexua+"\nUrtea: "+urtea);}
				
			}
		});
		botoia.setBounds(264, 115, 128, 25);
		contentPane.add(botoia);
	}
}
