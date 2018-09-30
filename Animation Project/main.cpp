#include<windows.h>
#ifdef __APPLE__
#include <GLUT/glut.h>
#else
#include <GL/glut.h>
#endif

#include <stdlib.h>
#include<stdio.h>
#include<iostream>
#include<math.h>
#include<fstream>
#include<time.h>
using namespace std;
#define PI acos(-1)
//.0/255.0,.0/255.0,.0/255.0
//    glVertex2f(.0,.0);


int saj[] = {0,13,1,12,2,11,3,10,4,9,5,8,6,7};
float front_leg_x[20][20],front_leg_y[20][20],rear_leg_x[20][20],rear_leg_y[20][20],b=0,f = 1,t_x[20],t_y[20],horse_body_x[20],horse_body_y[20];
int horse_cycle=0,f_b = 0,horse_bg=0,horse_fg=5,son_walking = 1,old_walking = 1,mr = 0;
time_t start_s;
float P=0.0;
float hata_x[10][10],hata_y[10][10];
int hata_f=1;
float dx=0,d = 0.5,dx_road,dx_c=0,dx_tree=0,dx_cloud=0,dx_man=0,move_stop=0,dx_horse;

struct color
{
    float r,g,b;
    color()
    {
        r=0,g=0,b=0;
    };
    color(float x,float y,float z)
    {
        r=x,g=y,b=z;
    }
};
color bl,blu,wh,gr,re,gry;

void horse_b_f(int x)
{
    //x=0;
    glColor3f(bl.r,bl.g,bl.b);
    glBegin(GL_LINE_STRIP);
    for(int i=0; i<14; i++)
        glVertex2f(dx_horse+rear_leg_x[x][i],rear_leg_y[x][i]);
    glEnd();

    glColor3f(wh.r,wh.g,wh.b);
    glBegin(GL_TRIANGLE_STRIP);
    for(int i=0; i<14; i++)
        glVertex2f(dx_horse+rear_leg_x[x][saj[i]],rear_leg_y[x][saj[i]]);
    glEnd();
}

void horse_f_f(int x)
{
    //x=5;
    glColor3f(bl.r,bl.g,bl.b);
    glBegin(GL_LINE_STRIP);
    for(int i=0; i<11; i++)
        glVertex2f(dx_horse+front_leg_x[x][i],front_leg_y[x][i]);
    glEnd();
    glColor3f(wh.r,wh.g,wh.b);
    glBegin(GL_TRIANGLE_STRIP);
    for(int i=0; 10-i>=i; i++)
    {
        glVertex2f(dx_horse+front_leg_x[x][i],front_leg_y[x][i]);
        glVertex2f(dx_horse+front_leg_x[x][10-i],front_leg_y[x][10-i]);
    }

    glEnd();
}



void horse_tail(int x)
{
    glColor3f(bl.r,bl.g,bl.b);
    glBegin(GL_LINE_STRIP);
    glVertex2f(dx_horse+horse_body_x[0],horse_body_y[0]);
    for(int i=0; i<10; i++)
        glVertex2f(dx_horse+t_x[i],t_y[i]);
    glEnd();

    glColor3f(wh.r,wh.g,wh.b);
    glBegin(GL_TRIANGLE_STRIP);

    glVertex2f(dx_horse+horse_body_x[0],horse_body_y[0]);
    for(int i=0; 9-i>i; i++)
    {
        glVertex2f(dx_horse+t_x[i],t_y[i]);
        glVertex2f(dx_horse+t_x[9-i],t_y[9-i]);
    }
    glVertex2f(dx_horse+rear_leg_x[x+5][1],rear_leg_y[x+5][1]);

    glEnd();
}
void horse_body(int x)
{

    glColor3f(bl.r,bl.g,bl.b);

    glBegin(GL_LINE_STRIP);
    glVertex2f(dx_horse+rear_leg_x[x+5][0],rear_leg_y[x+5][0]);
    glVertex2f(dx_horse+rear_leg_x[x][0],rear_leg_y[x][0]);
    for(int i=0; i<17; i++)
        glVertex2f(dx_horse+horse_body_x[i],horse_body_y[i]);
    glVertex2f(dx_horse+rear_leg_x[x][12],rear_leg_y[x][12]);
    glEnd();

    glColor3f(wh.r,wh.g,wh.b);
    glBegin(GL_TRIANGLE_STRIP);

    glVertex2f(dx_horse+rear_leg_x[x+5][0],rear_leg_y[x+5][0]);
    glVertex2f(dx_horse+rear_leg_x[x][0],rear_leg_y[x][0]);
    glVertex2f(dx_horse+rear_leg_x[x][12],rear_leg_y[x][12]);
    for(int i=0; 16-i>i; i++)
    {
        glVertex2f(dx_horse+horse_body_x[i],horse_body_y[i]);
        glVertex2f(dx_horse+horse_body_x[16-i],horse_body_y[16-i]);
    }
    glEnd();
}


void draw_horse()
{
    if(horse_cycle==0&&move_stop==1)
    {
        horse_bg = (horse_bg+5)%10;
        horse_fg = (horse_bg+5)%10;
    }

    horse_b_f(horse_cycle/2+horse_bg);
    horse_f_f(horse_cycle/2+horse_bg);
    horse_body(horse_cycle/2);
    horse_tail(horse_cycle/2);
    horse_b_f(horse_cycle/2+horse_fg);
    horse_f_f(horse_cycle/2+horse_fg);
}


void mirror()
{
    for(int i=0;i<20;i++)
    {
        horse_body_y[i] = 32-horse_body_y[i];
        t_y[i] = 32-t_y[i];
        for(int j=0;j<20;j++)
        {
            front_leg_y[i][j] = 32-front_leg_y[i][j];
            rear_leg_y[i][j] = 32-rear_leg_y[i][j];
        }
    }

}

void init_horse()
{
    float scl = 35,trns = 23;
    float xy[] =
    {
///92
        96, 130,
        77,172,
        81,233,
        70,260,
        43,285,
        7,393,
        23,415,
        20,424,
        60,444,
        32,394,
        66,300,
        134,256,
        170,233,
        186,202,





///93
        105,137,
        90,182,
        91,230,
        84,271,
        60,290,
        64,386,
        70,400,
        50,408,
        52,444,
        80,414,
        82,309,
        120,290,
        180,250,
        197,193,





///94
        110,120,
        86,160,
        92,213,
        112,256,
        90,296,
        115,389,
        123,400,
        103,418,
        118,441,
        138,405,
        111,300,
        180,261,
        193,233,
        193,175,





///95
        108,124,
        92,160,
        101,218,
        153,277,
        144,305,
        197,397,
        214,400,
        200,415,
        217,445,
        227,400,
        170,300,
        200,266,
        204,238,
        190,166,





///96
        144,119,
        133,177,
        165,235,
        190,270,
        184,307,
        233,426,
        251,421,
        255,444,
        292,444,
        250,403,
        211,309,
        233,233,
        233,233,
        230,151,



        144,119,
        133,177,
        165,235,
        190,270,
        184,307,
        233,426,
        251,421,
        255,444,
        292,444,
        250,403,
        211,309,
        233,233,
        238,186,
        230,151,





        ///93
        105,137,
        90,182,
        91,230,
        120,290,
        107,327,
        140,440,
        153,444,
        154,461,
        191,461,
        152,428,
        133,331,
        172,280,
        190,250,
        197,193,





        ///94
        110,120,
        86,160,
        92,213,
        106,262,
        90,294,
        104,418,
        120,444,
        129,460,
        155,460,
        128,427,
        118,328,
        180,261,
        193,233,
        193,175,





        ///95
        110,120,
        86,160,
        92,213,
        96,262,
        80,294,
        94,418,
        110,444,
        119,460,
        145,460,
        118,427,
        118,328,
        180,261,
        193,233,
        193,175,

        ///96
        96, 130,
        77,172,
        81,233,
        70,260,
        43,285,
        7,393,
        23,415,
        20,424,
        60,444,
        32,394,
        66,300,
        134,256,
        170,233,
        186,202,
    };
    float l_xy[] =
    {
        113,111,
        70,150,
        35,240,
        20,328,
        40,295,
        23,355,
        50,310,
        45,346,
        80,275,
        85,185,
    };
    int id = 0;
    for(int i=0; i<10; i++)
    {
        for(int j=0; j<14; j++)
        {
            rear_leg_x[i][j]=xy[id++]/scl;
            rear_leg_y[i][j]=trns-xy[id++]/scl;

            //cout<<rear_leg_x[i][j]<<"  "<<rear_leg_y[i][j]<<endl;
        }
    }
    id = 0;
    for(int j=0; j<10; j++)
    {
        t_x[j]=l_xy[id++]/scl;
        t_y[j]=trns-l_xy[id++]/scl;
    }

    float horse_body_xy[] =
    {
        150,100,
        280,105,
        365,85,
        500,25,
        530,27,
        566,11,
        547,30,
        576,22,
        555,42,
        595,135,
        570,155,
        535,103,
        500,95,
        453,147,
        420,219,
        275,255,
        222,232,
    };
    id = 0;
    for(int j=0; j<17; j++)
    {
        horse_body_x[j]=horse_body_xy[id++]/scl;
        horse_body_y[j]=trns-horse_body_xy[id++]/scl;
    }

    float front_leg_xy[]=
    {
        ///Samner pa front

///92
        345,185,
        340,333,
        340,313,
        333,412,
        346,420,
        350,440,
        383,440,
        355,400,
        365,315,
        412,200,
        390,120,

///93
        331,220,
        315,255,
        315,340,
        300,430,
        307,438,
        307,460,
        340,460,
        315,425,
        335,340,
        397,209,
        383,142,

///94
        327,220,
        309,245,
        305,335,
        274,410,
        283,422,
        275,444,
        300,464,
        295,410,
        322,344,
        400,200,
        385,145,


///95
        335,215,
        320,250,
        325,335,
        295,390,
        295,405,
        272,405,
        258,437,
        305,410,
        350,340,
        400,212,
        388,144,

///96
        390,195,
        386,242,
        433,317,
        409,372,
        407,387,
        383,380,
        370,410,
        417,400,
        460,315,
        435,260,
        450,153,


        ///92
        343,187,
        357,235,
        415,315,
        404,380,
        407,390,
        388,395,
        384,430,
        420,400,
        440,300,
        407,228,
        417,184,

        ///93
        360,222,
        375,270,
        430,340,
        472,427,
        482,437,
        477,452,
        515,460,
        444,327,
        410,257,
        431,203,
        400,140,


        //94
        336,226,
        370,270,
        420,440,
        435,444,
        444,463,
        478,457,
        432,421,
        417,333,
        408,262,
        430,200,
        404,151,

        //95
        355,233,
        355,271,
        375,333,
        388,435,
        401,440,
        407,461,
        440,460,
        400,420,
        398,333,
        407,260,
        417,211,

        //96

        388,194,
        385,240,
        397,316,
        390,415,
        405,427,
        413,444,
        445,444,
        400,390,
        417,320,
        453,195,
        429,123,


    };
    id = 0;
    for(int i=0; i<10; i++)
    {
        for(int j=0; j<11; j++)
        {
            front_leg_x[i][j]=front_leg_xy[id++]/scl;
            front_leg_y[i][j]=trns-front_leg_xy[id++]/scl;
            //cout<<rear_leg_x[i][j]<<"  "<<rear_leg_y[i][j]<<endl;
        }
    }

}



//void Rect(float x0,float y0,float x1,float y1, glcolor3f )

void rect(float x1,float y1,float x2,float y2,color c)
{
    glColor3f(c.r,c.g,c.b);
    glBegin(GL_POLYGON);
    glVertex2f(x1,y1);
    glVertex2f(x2,y1);
    glVertex2f(x2,y2);
    glVertex2f(x1,y2);
    glEnd();
}
void circle(float x=0,float y=0,float r=3,color c=wh)
{
    ///Code for Drawing the head.
    glColor3f(c.r,c.g,c.b);
    glBegin(GL_POLYGON);
    for(float i = 0,radius = r; i < 2 * PI; i += PI / 100) //<-- Change this Value
        glVertex2f(cos(i) * radius+x, sin(i) * radius+y);
    glEnd();
}
void cloud(float x,float y=30)
{
    for(int i=0; i<3; i++)
    {
        circle(x+i*4,y,3,wh);
        if(i==1)
            circle(x+i*4,y+2,4,wh);
    }
}

float sx(float x,float p,float s)//scale x co-ordinate to s
{
    return (p-x)*s+x;
}
float sy(float y,float p,float s)//scale y co-ordinate to s
{
    return (p-y)*s+y;
}
//sy(mx, ,s)
void man(int pos,float x,float y, float s)
{
///Code For walking
    float mx=5,my = 0;
    glBegin(GL_LINE_STRIP);
    for(int i=0; i<7; i++)
        glVertex2f(sx(mx, hata_x[pos][i],s)+x,sy(my, hata_y[pos][i],s)+y);
    glEnd();

    ///Code for hand movement
    glBegin(GL_LINE_STRIP);
    glVertex2f(sx(mx,3+d*pos,s)+x,sy(my, 5,s)+y);
    glVertex2f(sx(mx,5,s)+x,sy(my,11,s)+y);
    glVertex2f(sx(mx, 5,s)+x,sy(my, 13,s)+y);
    glVertex2f(sx(mx,5,s)+x,sy(my, 6,s)+y);
    glVertex2f(sx(mx, 5,s)+x,sy(my, 11,s)+y);
    glVertex2f(sx(mx, 7-d*pos,s)+x,sy(my,5,s)+y);
    glEnd();

    ///Code for Drawing the head.
    glBegin(GL_POLYGON);
    for(float i = 0,radius = 1; i < 2 * PI; i += PI / 6) //<-- Change this Value
        glVertex2f(cos(i) *s* radius+sx(mx, 5,s)+x, sin(i) *s* radius+sy(my,12.2,s)+y);
    glEnd();
}
void man_on_horse(int pos,float x,float y, float s)
{
///Code For walking
    float mx=5,my = 0;
    glBegin(GL_LINE_STRIP);
    for(int i=0; i<4; i++)
        glVertex2f(sx(mx, hata_x[pos][i],s)+x,sy(my, hata_y[pos][i],s)+y);
    glEnd();

    ///Code for hand movement
    glBegin(GL_LINE_STRIP);
    glVertex2f(sx(mx,3+d*pos,s)+x,sy(my, 5,s)+y);
    glVertex2f(sx(mx,5,s)+x,sy(my,11,s)+y);
    glVertex2f(sx(mx, 5,s)+x,sy(my, 13,s)+y);
    glVertex2f(sx(mx,5,s)+x,sy(my, 6,s)+y);
    glVertex2f(sx(mx, 5,s)+x,sy(my, 11,s)+y);
    glVertex2f(sx(mx, 7-d*pos,s)+x,sy(my,5,s)+y);
    glEnd();

    ///Code for Drawing the head.
    glBegin(GL_POLYGON);
    for(float i = 0,radius = 1; i < 2 * PI; i += PI / 6) //<-- Change this Value
        glVertex2f(cos(i) *s* radius+sx(mx, 5,s)+x, sin(i) *s* radius+sy(my,12.2,s)+y);
    glEnd();
}
void sky()
{
    for(int i=5; i<50; i+=1)
    {
        rect(0,10+i,100,80,color((200.0-i*3.2)/255.0,(200.0-i*2.8)/255.0,1));
    }
}
void sun()
{
    for(float r=7,i=1; r>1; r-=.02,i++)
        circle(5,55,r,color((70.0+i*.9)/255.0,(70.0+i)/255.0,1));
}

void tree(float x,float y,float s)
{
    float t_xy[]= {0,0,
                   4,5,
                   4,10,
                   0,16,
                   8,12,
                   10,19,
                   10,12,
                   9.5,7,
                   10,3,
                   12,0
                  };
    circle(x,16*s+y,5*s,color(0,.70,0));
    circle(3.5*s+x,22*s+y,5*s,color(0,.70,0));
    circle(7*s+x,21*s+y,5*s,color(0,.70,0));
    circle(12*s+x,19*s+y,5*s,color(0,.70,0));
    circle(12*s+x,16*s+y,5*s,color(0,.70,0));
    glColor3f(79.0/255.0,39.0/255.0,0/255.0);
    glBegin(GL_LINE_STRIP);
    for(int i=0; i<20; i+=2)
        glVertex2f(t_xy[i]*s+x,t_xy[i+1]*s+y);
    glEnd();

    glBegin(GL_TRIANGLE_STRIP);
    for(int i=0; 23-i>i; i+=2)
    {
        glVertex2f(t_xy[i]*s+x,t_xy[i+1]*s+y);
        glVertex2f(t_xy[19-i-1]*s+x,t_xy[19-i]*s+y);
    }
    glEnd();
}
void landscape()
{
    glColor3f(0,0.39,0);
    glBegin(GL_TRIANGLE_STRIP);
    glVertex2f(0,10);
    glVertex2f(0,20);
    glVertex2f(10,25);
    glVertex2f(5,10);
    glVertex2f(20,27);
    glVertex2f(30,10);
    glVertex2f(30,28);
    glVertex2f(40,10);
    glVertex2f(40,30);
    glVertex2f(60,10);
    glVertex2f(60,26);
    glVertex2f(70,10);
    glVertex2f(70,25);
    glVertex2f(80,10);
    glVertex2f(80,23);
    glVertex2f(90,10);
    glVertex2f(90,27);
    glVertex2f(100,10);
    glVertex2f(100,28);
    glEnd();
}

void *font;
void set_font(void *FONT)
{
    font = FONT;
}
void drawstring(float x,float y,char *str)///Draw a line of text from x,y co-ordinate
{
    void *currentfont = font;
    glColor3f(0,0,0);
    char *ct;
    glRasterPos2f(x,y);
    for(ct=str; *ct!='\0'; ct++)
        glutBitmapCharacter(currentfont,*ct);
}
void text_box(float x,float y)
{
    rect(x-10,y,x+20,y+10,wh);
    glBegin(GL_POLYGON);
    glVertex2f(x+5,y-3);
    glVertex2f(x+6,y+3);
    glVertex2f(x+4,y+3);
    glEnd();

}
void display(void)
{
    time_t tm=time(NULL)-start_s;
    glClear(GL_COLOR_BUFFER_BIT);
    glLoadIdentity();
    if(tm>=0&&tm<5)
    {
        set_font(GLUT_BITMAP_HELVETICA_18);
        drawstring(45,40,"Course No.: CSE 4202");
        drawstring(35,38,"Course Title: Sessional Based on CSE 4201");
        drawstring(45,23,"Submitted by:-");
        drawstring(45,21,"A.K.M.Rabby");
        drawstring(45,19,"Roll: 133018");
        drawstring(45,17,"Dept.: CSE");
        drawstring(45,15,"Sec: A");
        glutSwapBuffers();
        glFlush();
        return;
    }
    sky();
    sun();
    landscape();
    for(int i=0; i<2; i++)///Drawing multiple moving cloud
    {
        for(int j=0; j<3; j++)
        {
            cloud(j*33.33-dx_cloud+i*100,40+(j+2)*(j+2));
        }
    }
    for(int i=0; i<2; i++)///Drawing two moving cloud
    {
        tree(i*100+20-dx_tree,15,1);
        tree(i*100+50-dx_tree,15,2);
    }
    //tree(80,15,2);
    //drawstring(40,40,"here is my project");
    rect(0,0,100,15,gry);///Drawing a gray rectangle as road
    for(int i=0; i<11; i++)///code for moving Dots on road
    {
        rect(i*10.0-dx_road,8,i*10.0+3-dx_road,9,wh);
    }
    if(tm>=5&&tm<10)
    {
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,40,"One day an old man");
        drawstring(40,34,"and his son decided to go to");
        drawstring(40,28,"the market to sell a Horse.");
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>=50&&tm<55)
    {
        old_walking = 0;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,40,"Then the old man ride on the Horse");
        drawstring(40,34,"and his son kept going by walk");
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>=95&&tm<100)
    {
        son_walking = 0;
        old_walking = 1;
        dx_man = 0;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,40,"Then the old man felt guilty.");
        drawstring(40,34,"So he decided to trade place with his son.");
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>=130&&tm<132)
    {
        son_walking = 0;
        old_walking = 0;
        dx_man = 0;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,34,"So they both decided to ride.");
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>=166&&tm<170)
    {
        son_walking = 1;
        old_walking = 0;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,34,"So they decided to tie the horse in leg");
        drawstring(40,32,"and carry them on their back");
        if(mr == 0)
        {
            mirror();
            mr = 2;
        }
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>=178&&tm<183)
    {
        son_walking = 1;
        old_walking = 1;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);

        drawstring(40,36,"But people was laughing.");
        drawstring(40,34,"The horse was feeling uncomfortable.");
        drawstring(40,32,"So it kicked it's leg out and galloped away.donkey");
        if(mr == 2)
        {
            mirror();
            mr = 3;
        }
        glutSwapBuffers();
        glFlush();
        return;
    }
    if(tm>190)
    {
        son_walking = 1;
        old_walking = 1;
        set_font(GLUT_BITMAP_TIMES_ROMAN_24);
        drawstring(40,34,"Moral of the story: ");
        drawstring(40,32,"If you try to please all");
        drawstring(40,30,"You will please none.");
        if(mr == 2)
        {
            mirror();
            mr = 3;
        }
        glutSwapBuffers();
        glFlush();
        return;
    }

    if(tm>=183&&tm<190)
    {
        dx-=.5;
        dx_horse+=2;
    }

    draw_horse();

    //circle(10,60,10,wh);

    glColor3f(136.0/255.0,0.0/255.0,21.0/255.0);
    glLineWidth(8);
    //hata_f = (hata_f+1)%9;
    //man_on_horse(7,3,15,1);
    //man(7,85,10,.5);
    if(old_walking)
        man(hata_f,20-dx,10,1);
    else
        man_on_horse(7,3,15,1);
    if(son_walking)
        man((hata_f+3)%9,25-dx*0.5,10,.6);
    else
        man_on_horse(8,4,17,.6);
    //horse_cycle = (horse_cycle+1)%10;
    move_stop = 1;
    //cout<<tm<<endl;
    if(tm>=10&&tm<15)///initial
        dx_man = 0;
    if(tm>=15&&tm<45)///first group appear
    {
        man(6,100-dx_man,10,0.9);
        if(tm>28&&tm<35)
        {
            text_box(100-dx_man,25);
            set_font(GLUT_BITMAP_HELVETICA_18);
            drawstring(100-dx_man-9,32,"Why are you going by walk?");
            drawstring(100-dx_man-9,30,"You can ride your Horse and go.");
            move_stop = 0;
        }
    }
    if(tm>=45&&tm<50)
    {
        dx_man=0;
        text_box(25,25);
        drawstring(25-9,32,"He is right.");
        drawstring(25-9,30,"You should ride the horse.");
    }
    ///50-65 old man ride on the horse
    if(tm>=55&&tm<65)
        dx_man=0;
    if(tm>=65&&tm<95)///second group appear
    {
        old_walking = 0;
        man(7,100-dx_man,11,0.9);
        man(6,100-dx_man+5,11,1);

        if(tm>78&&tm<85)
        {
            text_box(100-dx_man,25);
            set_font(GLUT_BITMAP_HELVETICA_18);
            drawstring(100-dx_man-9,32,"This old man have no heart. ");
            drawstring(100-dx_man-9,30,"He comfortably ride the horse");
            drawstring(100-dx_man-9,28," while let the poor child walk");
            move_stop = 0;
        }
    }
    ///95-100 the boy ride on the horse

    if(tm>=100&&tm<130)///Third group appear
    {
        old_walking = 1;
        son_walking = 0;
        man(7,100-dx_man,11,0.9);
        man(6,100-dx_man+5,11,1);
        if(tm>113&&tm<120)
        {
            text_box(100-dx_man,25);
            set_font(GLUT_BITMAP_HELVETICA_18);
            drawstring(100-dx_man-9,32,"Look at that lazy young boy.");
            drawstring(100-dx_man-9,30,"He let the poor old man walk");
            move_stop = 0;
        }
    }
    if(tm>=133&&tm<166)///Fourth group appear
    {
        old_walking = 0;
        son_walking = 0;
        man(6,100-dx_man,9,.7);
        man(7,100-dx_man-3,9,0.9);
        man(6,100-dx_man+5,9,1);
        if(tm>146&&tm<153)
        {
            text_box(100-dx_man,25);
            set_font(GLUT_BITMAP_HELVETICA_18);
            drawstring(100-dx_man-9,32,"You should be shamed of yourself.");
            drawstring(100-dx_man-9,30,"Overloading the poor horse with");
            drawstring(100-dx_man-9,28,"two of you.");
            move_stop = 0;
        }
    }
    if(tm>=170&&tm<178)///Code for the stick
    {
        old_walking = 1;
        son_walking = 1;
        dx=23;
        horse_cycle=3;
        glColor3f(bl.r,bl.g,bl.b);
        glBegin(GL_LINE_STRIP);
        glVertex2f(0,21);
        glVertex2f(22,15);
        glEnd();
    }
    //dx+=0.5;
    if(move_stop)
    {
        dx_road+=0.2;
        dx_tree+=.5;
        dx_man+=0.5;
        horse_cycle = (horse_cycle+1)%10;
        hata_f = (hata_f+1)%9;
    }

    dx_cloud+=0.1;

    if(dx_road>=10)
        dx_road = 0;
    if(dx_cloud>=100)
        dx_cloud = 0;
    if(dx_tree>=100)
        dx_tree = 0;
    for(int j=0; j<50000000; j++);

    glutSwapBuffers();
    glFlush();
}

void initOpenGl()
{
    glClearColor(0.5,0.5,0.5,1); //Background Color
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();
    gluOrtho2D(0,100,0,60);
    glMatrixMode(GL_MODELVIEW);
}
int main(int argc,char **argv)
{
    start_s=time(NULL);
    // the code you wish to time goes here
    wh = color(1,1,1),bl = color(0,0,0),gr = color(0,.358,0),blu = color(0,0,0),re = color(1,0,0),gry = color(.3,.3,.3);
    init_horse();
    float xy[] =
    {
        3,0,
        2.33,0.33,
        4,3,
        5,6,
        7, 3,
        7.5,0,
        7.8,0.4,

        2.5,0,
        2,0.66,
        3.8, 3,
        5,6,
        7,3,
        7,0,
        8,0,

        2.5,0,
        2.4,1,
        5,3,
        5,6,
        6.5,3.1,
        6.1,0,
        7,0,

        4,0,
        3.8,.8,
        5.9,3,
        5,6,
        6,3,
        5.2,5.2,
        6,0,

        5.1,0.5,
        4,1,
        6,3.33,
        5,6,
        5.66,3,
        4.9,0,
        5.7,0,

        4.3,0,
        3.5,0,
        5,3,
        5,6,
        6,3.33,
        4.8,1,
        5,0.33,

        4,0,
        3.8, 0,
        4.9, 3,
        5,6,
        6.1,3,
        5.95,0.33,
        6.75, 0.33,

        4, 0,
        3, 0.30,
        4, 3,
        5, 6,
        6.3, 3.2,
        6.9, 0.33,
        6.9, 0.33,
        /*7.5, 1,*/

        3, 0,
        2.33,0.2,
        4, 3,
        5,6,
        6.33, 3.2,
        6.8,0.5,
        7.5, 1///ok
    };
    int id = 0;
    for(int i=0; i<9; i++)
    {
        for(int j=0; j<7; j++)
        {
            hata_x[i][j]=xy[id++];
            hata_y[i][j]=xy[id++];
            //cout<<hata_x[i][j]<<"  "<<hata_y[i][j]<<endl;
        }
    }
    glutInit(&argc,argv);
    glutInitDisplayMode(GLUT_DOUBLE|GLUT_RGBA|GLUT_DEPTH);
    glutInitWindowSize(1000,600);//1280*680
    glutInitWindowPosition(20,20);
    glutCreateWindow("Computer Graphics Project");
    initOpenGl();
    glutDisplayFunc(display);
    glutIdleFunc(display);
    glutMainLoop();
    return 0;
}
