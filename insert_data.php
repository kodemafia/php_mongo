<?php
include('include/config_mysql.php');

  //data
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $add=$_POST['add'];
   $pass=$_POST['pass'];
   $rpass=$_POST['rpass'];
   $country=$_POST['country'];
   $state=$_POST['state'];
   $city=$_POST['city'];
   $gen=$_POST['gen'];
   $phone=$_POST['phone'];
   $status=rand();
   echo $email;

   //Checks whether the given mail is already registered or not

     $sel_email="SELECT * FROM `user_info` WHERE `email`='$email'"; 
     $qry_email=mysql_query($sel_email);
     $sel_all_mail=mysql_num_rows($qry_email);
     //$fetch_mail=mysql_fetch_array($qry_email);

   if($sel_all_mail>0)
   {
    header('location:index.php?id=21');
   }
   else
   {
     
     
           

   //insert query
    $qry_insert=mysql_query("INSERT INTO `user_info`(`slno`, `firstname`, `lastname`, `email`, `address`,
    `password`, `repassword`, `country`, `state`, `city`, `gender`, `phone`, `status`) 
   	VALUES (null,'$fname','$lname','$email','$add','$pass',
   		'$rpass','$country','$state','$city','$gen','$phone','$status')");

  //mail function part



    $to=trim($email);
    //$subject="Activation Mail";
    //$msg="<a href='http://event.connectix.in/index.php?id=$status'>Plase click this link to confirm your registration</a>";
  
    
          $subject = "Activation Request"; 
          $from='umashankar_ghadai@yahoo.co.in';           
          $headers .= 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          //$headers .= 'Content-type: text/html'."\r\n";
          //$headers .='From:<umashankar_ghadai@yahoo.co.in>'."\r\n";
          $headers .= "From: $from \r\n" .  
                       "Reply-To: $from \r\n" .  
                       "X-Mailer: PHP/" . phpversion();  
          $today = date("F j, Y, g:i a"); 
          
          $txt="<html>"."<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"
                 ."<title>Activaltion mail for</title>"
              ."</head>".
            "<body>".
            "<table width='700' border='1' align='center'>".
            
            "<tr height='30' style='font-family:Tahoma, Geneva, sans-serif; background:F2F2F2;font-size:12px;color:#666'>".
            "<td width='100' align='center'>".
            "Activate Your Account :".
            "</td>".
            "<td><a href='http://event.connectix.in/index.php?id=$status'>Click here to Activate Account</a></td>".
            "</tr>".
            "</table>".
            "</body></html>";

    $gomail=mail($to,$subject,$txt,$headers);
    if($gomail)
    {
     header('location:confirm.php');
    }
    else
    {
      echo "mail sending is failed";
    }


   //below code is to store the data in mongoDB

   include('include/config_mongo.php');
   $data_mongo=array("firstname"=>$fname,"lastname"=>$lname,"email"=>$email,"address"=>$add,"password"=>$pass,
                  "country"=>$country,"state"=>$state,"city"=>$city,"Gender"=>$gen,"phone"=>$phone,"status"=>$status
              );
  $coll_user->insert($data_mongo);
  echo"Data inserted to mongodb succesfully";
   // echo"<script type='text/javascript'>localStorage.clear()</script>";
 //header("location:index.php");




  //the below code is to check between databases
   //echo"<script>localStorage.clear();</script>";
  
}//end of else
?>