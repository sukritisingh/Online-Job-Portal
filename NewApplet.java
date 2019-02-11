/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package javaapplication7;
import java.applet.Applet;
import java.awt.*;
import java.awt.event.*;
import java.applet.*;
import java.sql.*;
import javax.swing.JOptionPane;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.applet.Applet;

/**
 *
 * @author Sukriti Singh
 */
public class NewApplet extends Applet implements ActionListener {

     Label l1=new Label("user name");
  Label l2=new Label("password");
  Label l3=new Label(" ");
  TextField t1=new TextField();
  TextField t2=new TextField();
  Button b= new Button("Sign In");
  CheckboxGroup chkg=new CheckboxGroup();
  Checkbox one=new Checkbox("Employer",chkg,false);
    Checkbox two=new Checkbox("Employee",chkg,false);

    /**
     * Initialization method that will be called after the applet is loaded into
     * the browser.
     */
    public void init() {

         setLayout(null);
         add(l1);
    add(t1);
    add(l2);
    add(t2);
    add(b);
    add(l3);
    add(one);
    add(two);
    l1.setBounds(20,45,100,20);
    t1.setBounds(180,45,200,20);
    l2.setBounds(20,95,70,20);
    t2.setBounds(180,95,200,20);
    l3.setBounds(20,200,200,20);
    one.setBounds(20,180,100,20);
    two.setBounds(180,180,100,20);
    b.setBounds(310,145,70,20);
    b.addActionListener(this);
        // TODO start asynchronous download of heavy resources
    }

    public void actionPerformed(ActionEvent e) {



Connection con = null;
String url = "jdbc:mysql://localhost:3306/";
String db = "job";
String driver = "com.mysql.jdbc.Driver";
String userName ="root";
String password="";


         String email=t1.getText();
         String pass=t2.getText();

Statement st;
int flag=0;
String type=(chkg.getSelectedCheckbox()).getLabel();

try{
Class.forName(driver).newInstance();
con = DriverManager.getConnection(url+db,userName,password);
st = con.createStatement();
String query = "select * from "+type+";";
 ResultSet rs=st.executeQuery(query);

try{
while(rs.next()){
    System.out.println(query);
    String email1=rs.getString("email");

    String password1=rs.getString("password");

    //System.out.println(""+rs.getString("email"));
if(email1.equals(email)&&password1.equals(pass))
       {try {

                 flag=1;
	            l3.setText("Login Successful");
                    this.getAppletContext().showDocument(new URL("http://www.google.com"), "_blank");
                 //this.getAppletContext().showDocument(new URL(getCodeBase()+"main.html"),"_top");
	   }
	   catch (MalformedURLException ex) {
	    	System.out.println(ex.getMessage());
	   }

        }
else
{


        getAppletContext().showDocument(getDocumentBase(), "_self");
}

}

if(flag!=1){
    l3.setText("Invalid Login Credentials");
     t1.setText(null);
        t2.setText(null);
}

 }catch(Exception e11){
       System.out.println("ye hai error"+e11);

 }

}catch( ClassNotFoundException | InstantiationException | IllegalAccessException | SQLException e1){
    showStatus(""+e1);



}



        /*


             try
                {


        Class.forName("com.mysql.jdbc.Driver");
        String type=(chkg.getSelectedCheckbox()).getLabel();

        System.out.println(type);
         String email=t1.getText();
         String pass=t2.getText();
         String sql="Select email , password from "+type+";" ;
         DriverManager.registerDriver(new com.mysql.jdbc.Driver());
         Connection cn=DriverManager.getConnection("jdbc:mysql://localhost:3306/job","root","");
          System.out.println(sql);
         Statement stmt = cn.createStatement();
       ResultSet rs = stmt.executeQuery(sql);
       while(rs.next()){
              System.out.println("step 1");

           String email1=rs.getString("email");
           String password=rs.getString("password");

       if(email1==email&&pass==password)
       {
       getAppletContext().showDocument(new URL("http://www.google.com"), "_blank");
       //getAppletContext().showDocument(new URL(getCodeBase()+"newpage.html"),"_top");
        }

       }

        }
        catch(Exception ex)
        {
            JOptionPane.showMessageDialog(this, ex.getMessage(), "Command not accepted", JOptionPane.ERROR_MESSAGE);
        }
         */
         }
}
    // TODO overwrite start(), stop() and destroy() methods

