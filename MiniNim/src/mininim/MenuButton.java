/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mininim;

import java.awt.Color;
import javax.swing.JButton;

/**
 *
 * @author A. K. M. Rabby
 */
public class MenuButton extends JButton {

    public MenuButton(String label) {
        super(label);
        setBackground(Color.gray);
        setForeground(Color.white);
        setFocusPainted(false);
        setBorder(null);
        addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                setBackground(Color.blue);
            }

            public void mouseExited(java.awt.event.MouseEvent evt) {
                setBackground(Color.gray);
            }
        });
    }

}
