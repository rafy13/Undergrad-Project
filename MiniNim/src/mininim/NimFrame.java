/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mininim;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Insets;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Random;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.SwingConstants;

/**
 *
 * @author A.K.M.Rabby
 */
class NimFrame extends JFrame {

    // constructor for ButtonFrame
    nimGame game;
    JPanel p = new JPanel();
    Random rand = new Random();
    volatile int player_move = 0, computer_move = 0,error = 0,play_again=0;
    volatile JButton[][] butons = new RoundButton[30][30];
    JLabel label = new JLabel();
    JLabel turn = new JLabel();
    JButton again;
    Scanner sc = new Scanner(System.in);
    NimFrame(String title) throws InterruptedException {
        super(title);
        Nim();
    }
    void Nim() throws InterruptedException {
        
        again = new MenuButton("Play Again");
        game = new nimGame();
        p.removeAll();
        p.setLayout(null);
        p.add(label);
        p.add(turn);
        turn.setBounds(145,300,100,20);
        again.setBounds(145,300,62,20);
        turn.setVisible(true);
        p.setBackground(Color.white);
        
        label.setBackground(Color.black);
        //label.setForeground(Color.black);
        label.setBounds(75,100,200,50);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        label.setVerticalAlignment(SwingConstants.CENTER);
        label.setVisible(false);
        label.setOpaque(true);
        again.setBounds(145,150,62,20);
        p.add(again);
        again.setVisible(false);
        again.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e) {
                try {
                    
                    Nim();
                    label.setVisible(false);
                    again.setVisible(false);
                    play_again=1;
                } catch (InterruptedException ex) {
                    Logger.getLogger(NimFrame.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        });
        
        
        
        
        Insets insets = p.getInsets();
        int n, x = 40, m, row, col;
        //n = 4;
        //m = sc.nextInt();
        //nimGame game = new nimGame();
        n = game.column;
        //JButton[][] butons = new RoundButton[n][30];
        position columns = new position(n, 50, 360 - insets.left - insets.right);
        for (int i = 0; i < n; i++) {
            x = 40;
            m = (int) game.piles.get(i);
            for (int j = 0; j < m; j++) {
                butons[i][j] = new RoundButton(Integer.toString(j), i, j);
                butons[i][j].setBackground(Color.black);
                butons[i][j].setForeground(Color.white);
                butons[i][j].setBorder(null);
                p.add(butons[i][j]);
                //System.out.println(columns.pos.get(i));
                butons[i][j].setBounds((int) columns.pos.get(i), 360 - insets.bottom - insets.top - 41 - x, 20, 20);
                //butons[i].set
                x += 20;
                butons[i][j].setActionCommand(Integer.toString(i) + " " + Integer.toString(j));
                butons[i][j].addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        String str = e.getActionCommand();
                        String cmd[] = str.split(" ");
                        int col = Integer.parseInt(cmd[0]);
                        int i = Integer.parseInt(cmd[1]);
                        /*for (int j = i; j < (int)game.piles.get(col); j++) {
                         butons[col][j].setBackground(Color.red);
                         }*/
                        if (player_move == 1) {
                            for (int j = i; j < (int) game.piles.get(col); j++) {
                                butons[col][j].setVisible(false);
                            }
                            player_move = 0;
                            game.change(col, i);
                            computer_move = 1;
                        }
                    }
                });

                butons[i][j].addMouseListener(new java.awt.event.MouseAdapter() {
                    public void mouseEntered(java.awt.event.MouseEvent evt) {
                        RoundButton b = (RoundButton) evt.getSource();
                        for (int a = b.row; a < (int) game.piles.get(b.column); a++) {
                            butons[b.column][a].setBackground(Color.red);
                        }
                    }

                    public void mouseExited(java.awt.event.MouseEvent evt) {
                        RoundButton b = (RoundButton) evt.getSource();
                        for (int a = b.row; a < (int) game.piles.get(b.column); a++) {
                            butons[b.column][a].setBackground(Color.black);
                        }
                    }
                });

            }
        }
        
        
        
        JPanel menu = new JPanel();
        menu.setLayout(null);
        menu.setBackground(Color.black);
        JButton esy = new MenuButton("Easy");
        JButton mid = new MenuButton("Medium");
        JButton hrd = new MenuButton("Hard");
        
        menu.add(esy);
        menu.add(hrd);
        menu.add(mid);
        
        esy.setBounds(70,50,200,20);
        mid.setBounds(70,75,200,20);
        hrd.setBounds(70,100,200,20);
        
        esy.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e) {
                error = 50;
                getContentPane().removeAll();
                setContentPane(p);
                revalidate();
            }
        });
        mid.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e) {
                error = 20;
                getContentPane().removeAll();
                setContentPane(p);
                revalidate();
            }
        });
        hrd.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e) {
                error = 5;
                getContentPane().removeAll();
                setContentPane(p);
                revalidate();
            }
        });
        if(play_again==0)
            setContentPane(menu);
        else{
            //getContentPane().removeAll();
            //setContentPane(p);
            //revalidate();
            setContentPane(menu);
        }
        setMinimumSize(new Dimension(360, 360));
        // add the button to the JFrame
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }
    void play() throws InterruptedException {
        while(error == 0){
            Thread.sleep(300);
        }
        game.setError(error);
        int a = rand.nextInt();
        if (a % 2 == 0) {
            player_move = 1;
            turn.setText("<HTML><p align='center' style = 'color : red'>Your Turn</p></HTML>");
        } else {
            computer_move = 1;
            turn.setText("<HTML><p align='center' style = 'color : red'>Computer Turn</p></HTML>");
        }
        while (!game.isOver()) {
            if (player_move==1) {
                Thread.sleep(300);
            } 
            else {
                turn.setText("<HTML><p align='center' style = 'color : red'>Computer Turn</p></HTML>");
                Thread.sleep(300);
                move select = game.getMove();
                for (int j = select.y; j < (int) game.piles.get(select.x); j++) {
                    butons[select.x][j].setBackground(Color.red);
                }
                Thread.sleep(300);
                for (int j = select.y; j < (int) game.piles.get(select.x); j++) {
                    butons[select.x][j].setVisible(false);
                }
                game.change(select.x,select.y);
                computer_move = 0;
                player_move = 1;
                //System.out.println("else    "+select.x+"    "+select.y);
                turn.setText("<HTML><p align='center' style = 'color : red'>Your Turn</p></HTML>");
            }
        }
        if(player_move == 1){
            label.setText("<HTML><h2 style='color: red'>YOU LOSE</h2><HTML>");
            label.setVisible(true);
            again.setVisible(true);
            turn.setVisible(false);
            p.setBackground(Color.black);
            return;
        }
        else{
            label.setText("<HTML><h2 style='color: red'>YOU WIN</h2><HTML>");
            label.setVisible(true);
            again.setVisible(true);
            turn.setVisible(false);
            p.setBackground(Color.black);
            return;
        }
        
    }
}
