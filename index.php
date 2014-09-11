

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Evento Organizer</title>
<link href="css/default.css" rel="stylesheet" type="text/css">
<style>
#msg{
 border: solid;
height: 20px;
margin-top: 20px;
width: 360px;
}
.nav1{
  float: left;
  height: 31px;
  width: 345px;
  margin-left: 58px;
  margin-top: 10px;
}
</style>
<script src="js/jquery.2.1.1.js"></script>
<script>

</script>
</head>

<?php
  include('include/config_mysql.php');
 @$id=trim($_REQUEST['id']);
 //echo $id;
 if($id==2)
 {
  //echo"<script>"."userLogmsg()"."</script>";
  $msg="invalid Username and password";

 }
 elseif ($id==21) 
 {
 // echo"<script>"."alert('your email id is already registered')"."</script>";
  //header('location:index.php');
  $msg="Your MailId is already registered";
 }
 elseif ($id==12)
  {
   //echo"<script>"."alert('No extra data found in Mysql to insert into MongoDB')"."</script>";
    $msg="No Extra Data found in Mysql to insert into MongoDB";
 }
 else
 {
   $sel=mysql_query("UPDATE  `umashankar_eventCalender`.`user_info` SET  `status` =  '1' WHERE  `user_info`.`status`=$id");

 }

?>

<body>
  <div class="back"></div>
<div class="wrapper">

	<div class="heading">
    <div class="nav1">
          <?php echo @$msg; ?>
        </div>
   
    	<div class="nav">
        	<ul>
            	<li><a href="#" id="login">Login</a></li>
                <li><a href="#" id="reg">Register Now</a></li>
                <li><a href="synchro_dbs.php">Synchronise</a></li>
           </ul>
        </div>
    </div>
    <div class="mid" id="mid">
    	<div class="midline">
        	<a href="#" class="logo"></a>
            <div class="login-box">
                <form method="post" name="login_form" action="redirect.php">
            	<table width="100%" border="0" cellpadding="0">
                  <tr>
                    <td>User name :</td>
                    <td><input type="text" name="user" class="loginput" placeholder="Type your name here.." required></td>
                  </tr>
                  <tr>
                    <td>Password :</td>
                    <td><input type="password" name="pass" class="loginput" placeholder="Type your password here.." required></td>
                  </tr>
                  <tr>
                    <td><button class="logbtn" type="submit">Login</button> <button class="logbtn" type="button" id="lclose">Close</button></td>
                    <td><a href="#"><?php echo @$msg; ?></a></td>
                  </tr>
                </table>
            </form>
            </div>
            <div class="clr"></div>
        </div>
        
    </div>
    <div class="regbox" id="regbox">
        <!-- Registration form starts from here-->
          <form method="post" name="reg_form" id="reg_form" action="insert_data.php">
         <!-- <form method="post" name="reg_form" id="reg_form" action="#">-->
        	<ul>
            	<li>FirstName:<input type="text" class="input" name="fname" id="fname" placeholder="Type your firstname here.."></li>
                <li>LastName:<input type="text" class="input" name="lname" id="lname" placeholder="Type your Lastname here.."></li>
                <li>Email:<input type="text" class="input" name="email" id="email" placeholder="Type your Email here.."></li>
                <!--<li>Name:<input type="text" class="input" placeholder="Type your name here.."></li>
                <li>City:
                	<select class="input">
                	  <option>-Select City-</option>
                	  <option>asas</option>
                	  <option>fdfg</option>
                	  <option>hyjjkju</option>
                    
                    </select>
                	
			  </li>-->
              <li>Type Your Message:<textarea class="text" name="add" id="add">Enter Address</textarea></li>
                <li><button class="regbtn" type="button" id="rclose">Close</button><button class="regbtn" type="button" id="#">1st</button><button class="regbtn btn1" type="button" id="next">Next</button></li>
            </ul>
            
        </div>
        <div class="regbox" id="regbox2">
        	<ul>
            	<li>Password:<input type="password" class="input" name="pass" id="pass" placeholder="Type your password here"></li>
                <li>RetypePassword:<input type="password" class="input" name="rpass" id="rpass" placeholder="ReType your password here.."></li>
                <li>Country:<input type="text" class="input" name="country" id="country" placeholder="Type your country name here.."></li>
                <li>State:<input type="text" class="input" name="state" id="state" placeholder="Type your state name here.."></li>
                <li><button class="regbtn" type="button" id="back">back</button><button class="regbtn" type="button" id="#">2nd</button><button class="regbtn btn2" type="button" id="next">Next</button></li>
            </ul>
        </div>
        <div class="regbox" id="regbox3">
        	<ul>
            	<li>City:<input type="text" class="input" name="city" id="city" placeholder="Type your city name here.."></li>
                <!--<li>Gender:<input type="text" class="input" placeholder="Type your name here.."></li>-->
                <li>Gender:
                    <select class="input" name="gen" id="gen">
                      <option selected>-Select Gender-</option>
                      
                      <option>MALE</option>
                      <option>FEMALE</option>
                    
                    </select>
                <li>Phone:<input type="text" name="phone" id="phone" class="input" placeholder="Type your name here.."></li>
                <!--<li>Name:<input type="text" class="input" placeholder="Type your name here.."></li>-->
                <li><button class="regbtn" type="button" id="back">back</button><button class="regbtn" type="button" id="smt_btn">Submit</button></li>
            </ul>
        </form>
        <!-- ends the registration form -->
        </div>
</div>

<script>
$(document).ready(function(e) {
    $("#login").click(function(){
		$('.login-box').animate({'top':'0px'});
		$('#mid').animate({'padding-right':'0px'});
		$('#regbox').animate({'right':'-301px'});
		$('#regbox2').animate({'right':'-301px'});
		$('#regbox3').animate({'right':'-301px'});
	});
	$("#lclose").click(function(){
		$('.login-box').animate({'top':'100%'});
	});
	
	
	$("#reg").click(function(){
		$('#mid').animate({'padding-right':'301px'});
		$('#regbox').animate({'right':'0px'});
		$('.login-box').animate({'top':'100%'});
	});
	$("#regbox #next").click(function(){
		//$('#regbox2').animate({'right':'0px'});
	});
	$("#regbox2 #next").click(function(){
	//	$('#regbox3').animate({'right':'0px'});
	});
	
	$("#regbox #rclose").click(function(){
		$('#mid').animate({'padding-right':'0px'});
		$('#regbox').animate({'right':'-301px'});
	});
	$("#regbox2 #back").click(function(){
		$('#regbox2').animate({'right':'-301px'});
	});
	$("#regbox3 #back").click(function(){
		$('#regbox3').animate({'right':'-301px'});
	});
});

//below script is to store the data into localstorage
document.getElementById('smt_btn').onclick=function()
{
    //alert('hello local');
    //val_form3();
    var reg_phone=/^\d{10}$/;

    if(document.getElementById('city').value=="")
    {
      alert('please enter your city name');
      document.getElementById('city').focus();
    }
    else if(document.getElementById('gen').value=="")
    {
      alert('please select your gender');
      document.getElementById('gen').focus();
    }
    else if(document.getElementById('phone').value=="")
    {
      alert('please enter your phone no');
      document.getElementById('phone').focus();
    }
    else if(!document.getElementById('phone').value.match(reg_phone))
    {
      alert('please enter a valid phone no');
      document.getElementById('phone').focus();
    }
    else
    {
    
     if (typeof(Storage) != "undefined") 
     {
      //   alert('yes undefined');

          var fname=document.getElementById('fname').value;
        //  alert(fname);
          var lname=document.getElementById('lname').value;
          //alert(lname);
          var email=document.getElementById('email').value;
          //alert(email);
          var add=document.getElementById('add').value;
          //alert(add);
          var pass=document.getElementById('pass').value;
          //alert(pass);
          var rpass=document.getElementById('rpass').value;
          //alert(rpass);
          var country=document.getElementById('country').value;
          //alert(country);
          var state=document.getElementById('state').value;
          //alert(state);
          var city=document.getElementById('city').value;
          //alert(city);
          var gen=document.getElementById('gen').value;
          //alert(gen);
          var phone=document.getElementById('phone').value;
          //alert(phone);

           var user_info={"firstname":fname,"lastname":lname,"email":email,"address":add,"password":pass,"RetypePassword":rpass,"country":country,"state":state,"city":city,"Gender":gen,"phone":phone};
           for(var data in user_info)
           {
           localStorage[data]=user_info[data];
           }
     }

     document.getElementById('reg_form').submit();
   // localStorage.clear();
 }

 }
 


//Below code is to Retrieve all the data from the localstorage
window.onload=function()
{

    //localStorage.clear();
    //alert('ready to get value from localStorage');
    var g_fname=localStorage.getItem('firstname');
    //alert(g_fname);
    document.getElementById('fname').value=g_fname;
    var g_lname=localStorage.getItem('lastname');
    //alert(g_lname);
    document.getElementById('lname').value=g_lname;
    var g_email=localStorage.getItem('email');
    //alert(g_email);
    document.getElementById('email').value=g_email;

    var g_add=localStorage.getItem('address');
    //alert(g_add);
    document.getElementById('add').value=g_add;
    var g_pass=localStorage.getItem('password');
    //alert(g_pass);
    document.getElementById('pass').value=g_pass;
    var g_rpass=localStorage.getItem('RetypePassword');
    //alert(g_rpass);
    document.getElementById('rpass').value=g_rpass;

    var g_country=localStorage.getItem('country');
    //alert(g_country);
    document.getElementById('country').value=g_country;

     var g_state=localStorage.getItem('state');
     //alert(g_state);
     document.getElementById('state').value=g_state;

     var g_city=localStorage.getItem('city');
     //alert(g_city);
     document.getElementById('city').value=g_city;

     var g_gen=localStorage.getItem('Gender');
     //alert(g_gen);
     document.getElementById('gen').value=g_gen;

     var g_phone=localStorage.getItem('phone');
     //alert(g_phone);
     document.getElementById('phone').value=g_phone;
}

//Validation Script for the registration form part1
document.querySelector('.btn1').onclick=function()
{
   var reg_email=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 // alert('hello validation');
  if(document.getElementById('fname').value=="")
  {
    alert('Enter your first name');
    document.getElementById('fname').focus();
  }
  else if(document.getElementById('lname').value=="")
  {
    alert('Enter your last name');
    document.getElementById('lname').focus();
  }
  else if(document.getElementById('email').value=="")
  {
    alert('Enter your Email');
    document.getElementById('email').focus();
  }
  else if(!document.getElementById('email').value.match(reg_email))
  {
    alert('please enter a valid email');
    document.getElementById('email').focus();
  }
  else if(document.getElementById('add').value=="")
  {
    alert('please enter the address');
  }
  else
  {
    $('#regbox2').animate({'right':'0px'});
  }
}

//validation script for the registration form part 2
document.querySelector('.btn2').onclick=function()
{
 // alert('welcome to validation part 2');
  if(document.getElementById('pass').value=="")
  {
    alert('please Enter a password');
    document.getElementById('pass').focus();
  }
  else if(!document.getElementById('rpass').value.match(document.getElementById('pass').value))
  {
    alert('please Retype the password correctly');
    document.getElementById('rpass').focus();
  }
  else if(document.getElementById('country').value=="")
  {
    alert('please enter your country name');
    document.getElementById('country').focus();
  }
  else if(document.getElementById('state').value=="")
  {
    alert('please enter your state name');
    document.getElementById('state').focus();
  }
  else
  {
    $('#regbox3').animate({'right':'0px'});
  }
}

 /*function val_form3()
            {
              alert('welcome to validation part3');
              if(document.getElementById('city').value=="")
               {
                  alert('please enter your city name');
                  document.getElementById('city').focus();
                }
                else if(document.getElementById('gen').value=="")
                {
                  alert('please select your gender');
                  document.getElementById('gen').focus();
                }
                else if(document.getElementById('phone').value=="")
                {
                  alert('please enter your phone no');
                  document.getElementById('phone').focus();
                }
                else
                {
                  alert('validation complete');
                }
            }*/
</script>
</body>
</html>
