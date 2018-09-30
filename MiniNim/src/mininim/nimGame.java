/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mininim;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

/**
 *
 * @author A.K.M.Rabby
 */
public class nimGame {

    int column,error_rate;
    List piles = new ArrayList<Integer>();
    Random rand = new Random();
    void setError(int x){
        error_rate = x;
    }
    nimGame() {
        column = rand.nextInt(3) + 3;
        for (int i = 0; i < column; i++) {
            int a;
            a = rand.nextInt(8) + 5;
            piles.add(a);
        }
    }

    void change(int cl, int rw) {
        piles.set(cl, rw);
    }

    boolean isOver() {
        boolean flag = true;
        for (int i = 0; i < column; i++) {
            if ((int) piles.get(i) != 0) {
                flag = false;
            }
        }
        return flag;
    }

    move getRandomMove() {
        List moves = new ArrayList<move>();
        for (int i = 0; i < column; i++) {
            if ((int) piles.get(i) != 0) {
                moves.add(new move(i, rand.nextInt((int) piles.get(i))));
            }
        }
        move select = (move) moves.get((int) rand.nextInt(moves.size()));
        return select;
    }

    move getOptimalMove(int xor_sum) {
        List moves = new ArrayList<move>();
        for (int i = 0; i < column; i++) {
            int tem = xor_sum;
            tem ^= (int) piles.get(i);
            for (int j = 0; j < (int) piles.get(i); j++) {
                if ((tem ^ j) == 0) {
                    moves.add(new move(i, j));
                }
            }
        }
         move select = (move) moves.get((int) rand.nextInt(moves.size()));
        return select;
    }

    move getMove() {
        //System.out.println(error_rate);
        int xor_sum = 0,not_zero=0,sum=0;
        //int error_rate=50;
        List moves = new ArrayList<move>();
        for (int i = 0; i < column; i++) {
            xor_sum ^= (int) piles.get(i);
            sum+=(int) piles.get(i);
            not_zero++;
        }
        if (xor_sum == 0||(rand.nextInt(100)<=error_rate && sum>=10 && not_zero>2)) {
            return getRandomMove();
        } 
        else {
            return getOptimalMove(xor_sum);
        }
    }
}
