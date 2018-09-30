/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mininim;
/**
 *
 * @author A.K.M.Rabby
 */

public class MiniNim {

    public static void main(String[] args) throws InterruptedException {
        NimFrame frm = new NimFrame("MiniNim");
        frm.setVisible(true);
        frm.setResizable(false);
        frm.setLocationRelativeTo(null);
        frm.play();
        while(true){
            if(frm.play_again==0)
                Thread.sleep(400);
            else if(frm.play_again==1){
                frm.play_again=0;
                //System.out.println("play");
                frm.play();
                
            }
            else break;
        }
        System.out.println("Break");
        //frm.pack();
    }
}
