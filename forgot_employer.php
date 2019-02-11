<?php
if(isset($_POST['submit2'])){
$email=$_POST['email'];
$flag=0;
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$random=mt_rand(100000,999999);
$query=mysql_query("select * from employer");
while($results=mysql_fetch_array($query)){
	if($results[3]==$email)
		$flag=1;
}
if($flag==1){
	$query1=mysql_query("UPDATE `employer` SET `password`='$random' WHERE email='$email'");
}

if($flag==1){
require_once "Mail.php";
$type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "Forgot password";
   $body = "your password has been set to  : $random ";
   // $message = "This is simple text message.";
   $host = "ssl://smtp.gmail.com";
   $port = "465";
   $username = "pankulanil.garg2012@vit.ac.in";
   $password = "cts@vitcc";
   // $header = "From:abc@somedomain.com \r\n";
   // $retval = mail ($to,$subject,$message,$header);
   // if( $retval == true )  
   // {
   //    echo "Message sent successfully...";
   // }
   // else
   // {
   //    echo "Message could not be sent...";
   // }

   $headers = array("Content-type"=>$type,"From"=>$from,"To"=>$to,"Subject"=>$subject,"Body"=>$body);
   $smtp = @Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
   $mail = @$smtp->send($to,$headers,$body);
   echo "Please check your email-id $email.";
}
else
	echo "The id is not present in the database";
}
?>
<html>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
Please enter your email id : <input type="text" name="email"><br>
<input type="submit" name="submit2">
</form>
</html>