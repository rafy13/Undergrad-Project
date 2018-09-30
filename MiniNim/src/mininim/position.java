/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mininim;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author A.K.M.Rabby
 */
public class position {
    List pos = new ArrayList<Integer>();
    position(int n,int d,int ws){
        int mid = ws/2;
        if(n%2==0)
            mid-=d/2;
        int start = mid-((n+1)/2-1)*d;
        for(int i=0;i<n;i++)
        {
            pos.add(start);
            start+=d;
        }
    }
}
