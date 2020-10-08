<?php



$conn = mysqli_connect("localhost","root","","test1") or die("connection failed");
if(isset($_POST['submit'])){
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $subject = $_POST['subject1'];
    $textarea = $_POST['message'];
    if(isset($_POST['message'])){
      echo "get";
    }else{
      echo "not";
    }

    $insertquery = " insert into contact(name,email,subject,textarea) values('$name','$email','$subject','$textarea')";

   $result = mysqli_query($conn,$insertquery);
   if($result){
    ?>
   
   <style>
        .popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
 
  z-index:1;
  display:none;
}

.popup .contenta {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#f64c72;
  width:400px;
  height:200px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .overlay {
  display:block;
}

.popup.active .contenta {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}


h5{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
#mmm{
   font-size: 15px;
   font-family: 'Russo One', sans-serif;
}
#ppp{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
    </style>
</head>
<body>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="contenta">
          <div class="close-btn" id="g" onclick="togglePopup()">&times;</div>
         
          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
          </svg>
          <h5 id="ppp">Thank you</h5>
          <p id="mmm">Successfully Submited</p>
        </div>
      </div>
      
      <!-- <button onclick="togglePopup()">Show Popup</button>  -->

      <!-- --> <script>
         
  document.getElementById("popup-1").classList.toggle("active");

      </script>
      <script>
          function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
  document.getElementById("g").style.display ="none";
}
      </script>
    <?php
 }
 else{
     echo "dgfg";
 }
  }
 if(isset($_POST['submit'])){

  $title = ($_POST['name1']);
  $authors = ($_POST['email1']);
  $publicatio_year = ($_POST['subject1']);
  $the_journal = ($_POST['message']);
 
  
  $myFile = "data.json";
$arr_data = array(); // create empty array

try
{
//Get form data
$formdata = array(
  'name'=> $title ,
  'email'=>$authors,
  'subject'=> $publicatio_year,
    'textarea'=> $the_journal
   

);

//Get data from existing json file
$jsondata = file_get_contents($myFile);

// converts json data into array
$arr_data = json_decode($jsondata, true);

// Push user data to array
array_push($arr_data,$formdata);

 //Convert updated array to JSON
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($myFile, $jsondata)) {
    echo 'Data successfully saved';
}
else 
      echo "error";
  }
  catch (Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
  }


 }

 
  


    
   
  //   $title =htmlspecialchars($_POST['title']);
   


?>               

<?php

$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
 
  function encryptthis($data, $key) {
  $encryption_key = base64_decode($key);
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
  $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
  }
   
  function decryptthis($data, $key) {
  $encryption_key = base64_decode($key);
  list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
  return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
  }

  
$conn = mysqli_connect("localhost","root","","test1") or die("connection failed");
if(isset($_POST['submitt'])){
    $name = encryptthis($_POST['fname'], $key);
    $mname = encryptthis($_POST['mname'], $key);
    $lname = encryptthis($_POST['lname'], $key);
    $semail = password_hash($_POST['semail'], PASSWORD_BCRYPT);
    $country = encryptthis($_POST['country'], $key);
    $mobile = md5($_POST['mobile']);
    $dob = encryptthis($_POST['dob'], $key);
    $state = encryptthis($_POST['state'], $key);
    $city  = encryptthis($_POST['city'], $key);
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $insertquery = " insert into sign(fname,mname,lname,code,mnumber,dob,email,state,city,password) values('$name','$mname','$lname','$country','$mobile','$dob','$semail','$state','$city','$password')";

   $result = mysqli_query($conn,$insertquery);
   if($result){
    ?>
   
   <style>
        .popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
 
  z-index:1;
  display:none;
}

.popup .contenta {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#f64c72;
  width:400px;
  height:200px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .overlay {
  display:block;
}

.popup.active .contenta {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}


h5{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
#mmm{
   font-size: 15px;
   font-family: 'Russo One', sans-serif;
}
#ppp{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
    </style>
</head>
<body>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="contenta">
          <div class="close-btn" id="g" onclick="togglePopup()">&times;</div>
         
          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
          </svg>
          <h5 id="ppp">Thank you</h5>
          <p id="mmm">Successfully signUp</p>
        </div>
      </div>
      
      <!-- <button onclick="togglePopup()">Show Popup</button>  -->

      <!-- --> <script>
         
  document.getElementById("popup-1").classList.toggle("active");

      </script>
      <script>
          function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
 
}
      </script>
    <?php
 }
 else{
     echo "dgfg";
 }
  }
 if(isset($_POST['submitt'])){

  $name = encryptthis($_POST['fname'], $key);
  $mname = encryptthis($_POST['mname'], $key);
  $lname = encryptthis($_POST['lname'], $key);
  $semail = encryptthis($_POST['semail'], $key);
  $country = encryptthis($_POST['country'], $key);
  $mobile = encryptthis($_POST['mobile'], $key);
  $dob = encryptthis($_POST['dob'], $key);
  $state = encryptthis($_POST['state'], $key);
  $city  = encryptthis($_POST['city'], $key);
 $password = md5($_POST['password']);
 
  
  $myFile = "signup.json";
$arr_data = array(); // create empty array

try
{
//Get form data
$formdata = array(
  'fname'=> $name ,
  'mname'=>$mname,
  'lname'=>$lname,
  'email'=>$semail,
  'country'=>$country,
  'mobile'=>$mobile,
  'dob'=>$dob,
  'state'=>$state,
  'city'=>$city,
  'password'=>$password
   

);

//Get data from existing json file
$jsondata = file_get_contents($myFile);

// converts json data into array
$arr_data = json_decode($jsondata, true);

// Push user data to array
array_push($arr_data,$formdata);

 //Convert updated array to JSON
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($myFile, $jsondata)) {
    // echo 'Data successfully saved';
}
else 
      echo "error";
  }
  catch (Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
  }


 }
   
  


    
   
  //   $title =htmlspecialchars($_POST['title']);
  
  $conn = mysqli_connect("localhost","root","","test1") or die("connection failed");
  if(isset($_POST['submitlog'])){
    $logname = md5($_POST['logname']);
    
    $logpassword = ($_POST['logpassword']);
    $getuser = $conn->prepare('SELECT `mnumber`, `password`
                       FROM `sign` WHERE `mnumber` = ?');
                      
    $getuser->bind_param('s', $logname);
    $getuser->execute();
    $userdata = $getuser->get_result();
    $row = $userdata->fetch_array(MYSQLI_ASSOC);
    // echo 'Password from form: ' . $password . '<br />';
    $hash1 =  $row['password'];
    echo 'Password from DB: ' . $row['password'] . '<br />';
    $ver = password_verify($logpassword,$hash1);
    if(password_verify($logpassword,$hash1)){
      ?>
      <style>
      .popup .overlay {
position:fixed;
top:0px;
left:0px;
width:100vw;
height:100vh;
background:rgba(0,0,0,0.7);

z-index:1;
display:none;
}

.popup .contenta {
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%) scale(0);
background:#f64c72;
width:400px;
height:200px;
z-index:2;
text-align:center;
padding:20px;
box-sizing:border-box;
font-family:"Open Sans",sans-serif;
}

.popup .close-btn {
cursor:pointer;
position:absolute;
right:20px;
top:20px;
width:30px;
height:30px;
background:#222;
color:#fff;
font-size:25px;
font-weight:600;
line-height:30px;
text-align:center;
border-radius:50%;
}

.popup.active .overlay {
display:block;
}

.popup.active .contenta {
transition:all 300ms ease-in-out;
transform:translate(-50%,-50%) scale(1);
}


h5{
font-size: 25px;
font-family: 'Russo One', sans-serif;
}
#mmm{
 font-size: 15px;
 font-family: 'Russo One', sans-serif;
}
#ppp{
font-size: 25px;
font-family: 'Russo One', sans-serif;
}
  </style>
</head>
<body>
  <div class="popup" id="popup-1">
      <div class="overlay"></div>
      <div class="contenta">
        <div class="close-btn" id="g" onclick="togglePopup()">&times;</div>
       
        <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
        </svg>
        <h5 id="ppp">Thank you</h5>
        <p id="mmm">Successfully login</p>
      </div>
    </div>
    
    <!-- <button onclick="togglePopup()">Show Popup</button>  -->

    <!-- --> <script>
       
document.getElementById("popup-1").classList.toggle("active");

    </script>
    <script>
        function togglePopup(){
document.getElementById("popup-1").classList.toggle("active");

}
    </script>
    <?php
    }else
    echo ".......no.";
    
    
   
  }


   


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">

    
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body onload="Captcha()">
<header class="header">

<nav class="main-nav">
    <div class="container">
        
        <ul class="main-nav__list">
            <li class="main-nav__item main-nav__item--active"><a href="#section1" class="main-nav__link">HOME</a></li>
            <li class="main-nav__item"><a href="#section2" class="main-nav__link">ABOUT US</a></li>
            <li class="main-nav__item"><a href="#section3" class="main-nav__link">SERVICE</a></li>
  <li class="main-nav__item"><a href="#section4" class="main-nav__link">CONTACT</a></li>
            <li class="main-nav__active"></li>
        </ul>
       <div id="right-menu">
       <button id="login" onclick="togglePop()">sign-Up</button>
       <button id="login" onclick="togglePopu()">LogIn</button>
       </div>
    </div>
</nav>
</header>

<main>
<style>
        .popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
 
  z-index:1;
  display:none;
}

.popup .contentappp {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#f64c72;
  width:700px;
  height:700px;
  z-index:16;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family: 'Russo One', sans-serif;
  margin-top: 70px;
}

@media screen and (max-width: 820px) {
  .popup .contentappp{
    
    width: 500px;
    height: 1000;
   
  }
}
@media screen and (max-width:550px){
  .popup .contentappp{
    width: 350px;
    height: 1000px;
  }
}

.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .overlay {
  display:block;
}

.popup.active .contentappp {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}


h5{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
#mmm{
   font-size: 15px;
   font-family: 'Russo One', sans-serif;
}
#ppp{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
#mar{
  margin-top: 30px;
}
#qwert{
  width: 100px;
  font-family: 'Russo One', sans-serif;
}
    </style>
</head>
<body>
    <!-- <div class="popup" id="popup-3">
        <div class="overlay"></div>
        <div class="contentappp">
          <div class="close-btn" id="g" onclick="togglePopu()">&times;</div>
         
         
         <div class="form-row">
           <div class="col-3"></div>
           <div class="col-6" id="mar">
             <label for="exampleInputPassword1">name or email</label>
             <input type="text" class="form-control" >
           </div>
           <div class="col-3"></div>
         </div>

         <div class="form-row">
           <div class="col-3"></div>
           <div class="col-6" id="mar">
             <label for="exampleInputPassword1">name or email</label>
             <input type="text" class="form-control" >
           </div>
           <div class="col-3"></div>
         </div>
        </div>
      </div>
      
     
      <script>
          function togglePopu(){
  document.getElementById("popup-3").classList.toggle("active");
  document.getElementById("g").style.display ="none";
}
      </script> -->

      <!-- <style>
        .popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
 
  z-index:1;
  display:none;
}

.popup .contenta {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#f64c72;
  width:400px;
  height:200px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .overlay {
  display:block;
}

.popup.active .contenta {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}


h5{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
#mmm{
   font-size: 15px;
   font-family: 'Russo One', sans-serif;
}
#ppp{
  font-size: 25px;
  font-family: 'Russo One', sans-serif;
}
    </style> -->

    <div class="popup" id="popup-3">
        <div class="overlay"></div>
        <div class="contentappp">
          <div class="close-btn" id="g" onclick="togglePopu()">&times;</div>

          <img src="https://img.icons8.com/ios-filled/100/000000/login-rounded-right.png"/>
         
         <h1>Log In</h1>
         <form action="" method="post" onsubmit="return ValidCaptcha()">
          <div class="form-row">
           <div class="col-3"></div>
           <div class="col-6" id="mar">
             <label for="exampleInputPassword1" >mobile number or email</label>
             <input type="text" class="form-control" placeholder="Mobile number or Email" name="logname" required>
           </div>
           <div class="col-3"></div>
         </div>

         <div class="form-row">
           <div class="col-3"></div>
           <div class="col-6" id="mar">
             <label for="exampleInputPassword1"  >Password</label>
             <input type="password" name="logpassword" class="form-control" placeholder="Password" required >
           </div>
           <div class="col-3"></div>
         </div>
         
        <div class="form-row">
          <div class="col-3"></div>
          <div class="col-6">
          <h2 type="text" id="mainCaptcha"></h2>
             <input type="text" id="txtInput" placeholder="Enter Captcha" class="form-control">  <span id="cap"></span>  
   <!-- <input id="Button1" type="button" value="Check" onclick="alert(ValidCaptcha());"/> -->
          </div>
          <div class="col-3"> <button id="qwertyu" type="reset" onclick="Captcha();">Refresh</button> </div>
          
        </div>

        <div class="form-row">
           <div class="col-4"></div>
           <div class="col-3" id="mar">
             <button id="qwert" type="submit" name="submitlog">LogIn</button>
           </div>
           <div class="col-5"></div>
         </div>

       </div>
   
         </form>

        </div>
      </div>
      
      <!-- <button onclick="togglePopup()">Show Popup</button>  -->

      <!-- -->
      <script>
          function togglePopu(){
  document.getElementById("popup-3").classList.toggle("active");
  
}
      </script>
      <script>
    function Captcha(){
     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
	 	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
 	    	'0','1','2','3','4','5','6','7','8','9');
     var i;
     for (i=0;i<6;i++){
         var a = alpha[Math.floor(Math.random() * alpha.length)];
         var b = alpha[Math.floor(Math.random() * alpha.length)];
         var c = alpha[Math.floor(Math.random() * alpha.length)];
         var d = alpha[Math.floor(Math.random() * alpha.length)];
         var e = alpha[Math.floor(Math.random() * alpha.length)];
         var f = alpha[Math.floor(Math.random() * alpha.length)];
         var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
         var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
         document.getElementById("mainCaptcha").innerHTML = code
		 document.getElementById("mainCaptcha").value = code
       }
function ValidCaptcha(){
     var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
     var string2 =         removeSpaces(document.getElementById('txtInput').value);
     if (string1 == string2){
       document.getElementById('cap').innerHTML = "";
            return true;
     }else{
      document.getElementById('cap').innerHTML = "Please Correct Captcha";        
          return false;
          }
}
function removeSpaces(string){
     return string.split(' ').join('');
}
  </script>

<div class="popup" id="popup-2">
        <div class="overlay"></div>
        <div class="contentaa">
          <div class="close-btn" id="b" onclick="togglePop()">&times;</div>
          <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-arrow-up-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
</svg>
         <h1>signUp</h1>
          <form method="POST" action="" onsubmit="return signUp()">
  <div class="form-row">
    <div class="col-5">
    <label for="exampleInputPassword1">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" onkeyup="fName()"><span id="ssname"></span>
    </div>
    <div class="col-2">
    <label for="exampleInputPassword1">Middle Name</label>
      <input type="text" class="form-control" placeholder="middle name" id="mname" name="mname" onkeyup="mName()"><span id="ssmname"></span>
    </div>
    <div class="col-5">
    <label for="exampleInputPassword1">Last Name</label>
      <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname" onkeyup="lName()"><span id="sslname"></span>
    </div>
  
  </div>
  <div class="form-row">
    
  
  <div class="col-5">
  <select class="custom-select custom-select-lg mb-4" id="scoun" name="country">
  <option data-countryCode="DZ" value="">Select Country Code</option>
  <option data-countryCode="DZ" value="213" name="213">Algeria (+213)</option>
		<option data-countryCode="AD" value="376" name="376">Andorra (+376)</option>
		<option data-countryCode="AO" value="244" name="244">Angola (+244)</option>
		<option data-countryCode="AI" value="1264"  name="1264">Anguilla (+1264)</option>
		<option data-countryCode="AG" value="1268" name="1268">Antigua &amp; Barbuda (+1268)</option>
		<option data-countryCode="AR" value="54" name="54">Argentina (+54)</option>
		<option data-countryCode="AM" value="374" name="374">Armenia (+374)</option>
		<option data-countryCode="AW" value="297" name="297">Aruba (+297)</option>
		<option data-countryCode="AU" value="61" name="61">Australia (+61)</option>
		<option data-countryCode="AT" value="43" name="43">Austria (+43)</option>
		<option data-countryCode="AZ" value="994" name="994">Azerbaijan (+994)</option>
		<option data-countryCode="BS" value="1242" name="1242">Bahamas (+1242)</option>
		<option data-countryCode="BH" value="973" name="973">Bahrain (+973)</option>
		<option data-countryCode="BD" value="880" name="880">Bangladesh (+880)</option>
		<option data-countryCode="BB" value="1246" name="1246">Barbados (+1246)</option>
		<option data-countryCode="BY" value="375"  name="375">Belarus (+375)</option>
		<option data-countryCode="BE" value="32"  name="32">Belgium (+32)</option>
		<option data-countryCode="BZ" value="501" name="501">Belize (+501)</option>
		<option data-countryCode="BJ" value="229"  name="229">Benin (+229)</option>
		<option data-countryCode="BM" value="1441" name="1441">Bermuda (+1441)</option>
		<option data-countryCode="BT" value="975"  name="975">Bhutan (+975)</option>
		<option data-countryCode="BO" value="591" name="591">Bolivia (+591)</option>
		<option data-countryCode="BA" value="387"  name="387">Bosnia Herzegovina (+387)</option>
		<option data-countryCode="BW" value="267" name="267">Botswana (+267)</option>
		<option data-countryCode="BR" value="55"  name="55">Brazil (+55)</option>
		<option data-countryCode="BN" value="673" name="673">Brunei (+673)</option>
		<option data-countryCode="BG" value="359"  name="359">Bulgaria (+359)</option>
		<option data-countryCode="BF" value="226" name="226">Burkina Faso (+226)</option>
		<option data-countryCode="BI" value="257" name="257">Burundi (+257)</option>
		<option data-countryCode="KH" value="855" name="855">Cambodia (+855)</option>
		<option data-countryCode="CM" value="237" name="237">Cameroon (+237)</option>
		<option data-countryCode="CA" value="1" name="1">Canada (+1)</option>
		<option data-countryCode="CV" value="238" name="238">Cape Verde Islands (+238)</option>
		<option data-countryCode="KY" value="1345"  name="1345">Cayman Islands (+1345)</option>
		<option data-countryCode="CF" value="236" name="236">Central African Republic (+236)</option>
		<option data-countryCode="CL" value="56" name="56">Chile (+56)</option>
		<option data-countryCode="CN" value="86">China (+86)</option>
		<option data-countryCode="CO" value="57">Colombia (+57)</option>
		<option data-countryCode="KM" value="269">Comoros (+269)</option>
		<option data-countryCode="CG" value="242">Congo (+242)</option>
		<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
		<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
		<option data-countryCode="HR" value="385">Croatia (+385)</option>
		<option data-countryCode="CU" value="53">Cuba (+53)</option>
		<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
		<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
		<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
		<option data-countryCode="DK" value="45">Denmark (+45)</option>
		<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
		<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
		<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
		<option data-countryCode="EC" value="593">Ecuador (+593)</option>
		<option data-countryCode="EG" value="20">Egypt (+20)</option>
		<option data-countryCode="SV" value="503">El Salvador (+503)</option>
		<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
		<option data-countryCode="ER" value="291">Eritrea (+291)</option>
		<option data-countryCode="EE" value="372">Estonia (+372)</option>
		<option data-countryCode="ET" value="251">Ethiopia (+251)</optnam
		<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
		<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
		<option data-countryCode="FJ" value="679">Fiji (+679)</option>
		<option data-countryCode="FI" value="358">Finland (+358)</option>
		<option data-countryCode="FR" value="33">France (+33)</option>
		<option data-countryCode="GF" value="594">French Guiana (+594)</option>
		<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
		<option data-countryCode="GA" value="241">Gabon (+241)</option>
		<option data-countryCode="GM" value="220">Gambia (+220)</option>
		<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
		<option data-countryCode="DE" value="49">Germany (+49)</option>
		<option data-countryCode="GH" value="233">Ghana (+233)</option>
		<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
		<option data-countryCode="GR" value="30">Greece (+30)</option>
		<option data-countryCode="GL" value="299">Greenland (+299)</option>
		<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
		<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
		<option data-countryCode="GU" value="671">Guam (+671)</option>
		<option data-countryCode="GT" value="502">Guatemala (+502)</option>
		<option data-countryCode="GN" value="224">Guinea (+224)</option>
		<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
		<option data-countryCode="GY" value="592">Guyana (+592)</option>
		<option data-countryCode="HT" value="509">Haiti (+509)</option>
		<option data-countryCode="HN" value="504">Honduras (+504)</option>
		<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
		<option data-countryCode="HU" value="36">Hungary (+36)</option>
		<option data-countryCode="IS" value="354">Iceland (+354)</option>
		<option data-countryCode="IN" value="91">India (+91)</option>
		<option data-countryCode="ID" value="62">Indonesia (+62)</option>
		<option data-countryCode="IR" value="98">Iran (+98)</option>
		<option data-countryCode="IQ" value="964">Iraq (+964)</option>
		<option data-countryCode="IE" value="353">Ireland (+353)</option>
		<option data-countryCode="IL" value="972">Israel (+972)</option>
		<option data-countryCode="IT" value="39">Italy (+39)</option>
		<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
		<option data-countryCode="JP" value="81">Japan (+81)</option>
		<option data-countryCode="JO" value="962">Jordan (+962)</option>
		<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
		<option data-countryCode="KE" value="254">Kenya (+254)</option>
		<option data-countryCode="KI" value="686">Kiribati (+686)</option>
		<option data-countryCode="KP" value="850">Korea North (+850)</option>
		<option data-countryCode="KR" value="82">Korea South (+82)</option>
		<option data-countryCode="KW" value="965">Kuwait (+965)</option>
		<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
		<option data-countryCode="LA" value="856">Laos (+856)</option>
		<option data-countryCode="LV" value="371">Latvia (+371)</option>
		<option data-countryCode="LB" value="961">Lebanon (+961)</option>
		<option data-countryCode="LS" value="266">Lesotho (+266)</option>
		<option data-countryCode="LR" value="231">Liberia (+231)</option>
		<option data-countryCode="LY" value="218">Libya (+218)</option>
		<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
		<option data-countryCode="LT" value="370">Lithuania (+370)</option>
		<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
		<option data-countryCode="MO" value="853">Macao (+853)</option>
		<option data-countryCode="MK" value="389">Macedonia (+389)</option>
		<option data-countryCode="MG" value="261">Madagascar (+261)</option>
		<option data-countryCode="MW" value="265">Malawi (+265)</option>
		<option data-countryCode="MY" value="60">Malaysia (+60)</option>
		<option data-countryCode="MV" value="960">Maldives (+960)</option>
		<option data-countryCode="ML" value="223">Mali (+223)</option>
		<option data-countryCode="MT" value="356">Malta (+356)</option>
		<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
		<option data-countryCode="MQ" value="596">Martinique (+596)</option>
		<option data-countryCode="MR" value="222">Mauritania (+222)</option>
		<option data-countryCode="YT" value="269">Mayotte (+269)</option>
		<option data-countryCode="MX" value="52">Mexico (+52)</option>
		<option data-countryCode="FM" value="691">Micronesia (+691)</option>
		<option data-countryCode="MD" value="373">Moldova (+373)</option>
		<option data-countryCode="MC" value="377">Monaco (+377)</option>
		<option data-countryCode="MN" value="976">Mongolia (+976)</option>
		<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
		<option data-countryCode="MA" value="212">Morocco (+212)</option>
		<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
		<option data-countryCode="MN" value="95">Myanmar (+95)</option>
		<option data-countryCode="NA" value="264">Namibia (+264)</option>
		<option data-countryCode="NR" value="674">Nauru (+674)</option>
		<option data-countryCode="NP" value="977">Nepal (+977)</option>
		<option data-countryCode="NL" value="31">Netherlands (+31)</option>
		<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
		<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
		<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
		<option data-countryCode="NE" value="227">Niger (+227)</option>
		<option data-countryCode="NG" value="234">Nigeria (+234)</option>
		<option data-countryCode="NU" value="683">Niue (+683)</option>
		<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
		<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
		<option data-countryCode="NO" value="47">Norway (+47)</option>
		<option data-countryCode="OM" value="968">Oman (+968)</option>
		<option data-countryCode="PW" value="680">Palau (+680)</option>
		<option data-countryCode="PA" value="507">Panama (+507)</option>
		<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
		<option data-countryCode="PY" value="595">Paraguay (+595)</option>
		<option data-countryCode="PE" value="51">Peru (+51)</option>
		<option data-countryCode="PH" value="63">Philippines (+63)</option>
		<option data-countryCode="PL" value="48">Poland (+48)</option>
		<option data-countryCode="PT" value="351">Portugal (+351)</option>
		<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
		<option data-countryCode="QA" value="974">Qatar (+974)</option>
		<option data-countryCode="RE" value="262">Reunion (+262)</option>
		<option data-countryCode="RO" value="40">Romania (+40)</option>
		<option data-countryCode="RU" value="7">Russia (+7)</option>
		<option data-countryCode="RW" value="250">Rwanda (+250)</option>
		<option data-countryCode="SM" value="378">San Marino (+378)</option>
		<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
		<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
		<option data-countryCode="SN" value="221">Senegal (+221)</option>
		<option data-countryCode="CS" value="381">Serbia (+381)</option>
		<option data-countryCode="SC" value="248">Seychelles (+248)</option>
		<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
		<option data-countryCode="SG" value="65">Singapore (+65)</option>
		<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
		<option data-countryCode="SI" value="386">Slovenia (+386)</option>
		<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
		<option data-countryCode="SO" value="252">Somalia (+252)</option>
		<option data-countryCode="ZA" value="27">South Africa (+27)</option>
		<option data-countryCode="ES" value="34">Spain (+34)</option>
		<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
		<option data-countryCode="SH" value="290">St. Helena (+290)</option>
		<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
		<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
		<option data-countryCode="SD" value="249">Sudan (+249)</option>
		<option data-countryCode="SR" value="597">Suriname (+597)</option>
		<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
		<option data-countryCode="SE" value="46">Sweden (+46)</option>
		<option data-countryCode="CH" value="41">Switzerland (+41)</option>
		<option data-countryCode="SI" value="963">Syria (+963)</option>
		<option data-countryCode="TW" value="886">Taiwan (+886)</option>
		<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
		<option data-countryCode="TH" value="66">Thailand (+66)</option>
		<option data-countryCode="TG" value="228">Togo (+228)</option>
		<option data-countryCode="TO" value="676">Tonga (+676)</option>
		<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
		<option data-countryCode="TN" value="216">Tunisia (+216)</option>
		<option data-countryCode="TR" value="90">Turkey (+90)</option>
		<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
		<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
		<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
		<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
		<option data-countryCode="UG" value="256">Uganda (+256)</option>
		<option data-countryCode="GB" value="44">UK (+44)</option>
		<option data-countryCode="UA" value="380">Ukraine (+380)</option>
		<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
		<option data-countryCode="UY" value="598">Uruguay (+598)</option>
		<option data-countryCode="US" value="1">USA (+1)</option>
		<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
		<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
		<option data-countryCode="VA" value="379">Vatican City (+379)</option>
		<option data-countryCode="VE" value="58">Venezuela (+58)</option>
		<option data-countryCode="VN" value="84">Vietnam (+84)</option>
		<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
		<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
		<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
		<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
		<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
		<option data-countryCode="ZM" value="260">Zambia (+260)</option>
		<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
 
</select><span id="ssss"></span>
  </div>
  <div class="col-7">
  <label for="moblie">Moblie Name</label>
      <input type="text" class="form-control" placeholder="moblie number"  id="mobile" name="mobile" onkeyup=" mObile()"><span id="ssmoblie"></span>
    </div>
  </div>
  <div class="form-row">
    <div class="col-6">
    <label for="moblie">Date  Of Birth</label>
    <input type="date" class="form-control" placeholder="" id="dob" name="dob" onkeyup="dOb()"><span id="sdob"></span><span id="ppppppp"></span>
    </div>
    <div class="col-6">
    <label for="moblie">Email</label>
    <input type="text" class="form-control" placeholder="Email" id="semail" name="semail" onkeyup="eMail()"><span id="ssemail"></span>
    </div>
  </div>
  <div class="form-row">
  <div class="col-6">
  <label for="moblie">State</label>
  <select class="custom-select custom-select-lg " id="state" name="state">
  <option value="">None</option>
  <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands" name="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh" name="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam" name="Assam">Assam </option>
<option value="Bihar" name="Bihar">Bihar</option>
<option value="Chandigarh" name="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh" name="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli" name="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu" name="Daman and Diu">Daman and Diu</option>
<option value="Delhi"  name="Delhi">Delhi</option>
<option value="Lakshadweep"name="Lakshadweep">Lakshadweep</option>
<option value="Puducherry"  name="Puducherry">Puducherry</option>
<option value="Goa" name="Goa">Goa</option>
<option value="Gujarat" name="Gujarat">Gujarat</option>
<option value="Haryana" name="Haryana">Haryana</option>
<option value="Himachal Pradesh" name="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir" name="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand" name="Jharkhand">Jharkhand</option>
<option value="Karnataka" name="Karnataka">Karnataka</option>
<option value="Kerala" name="Kerala">Kerala</option>
<option value="Madhya Pradesh" name="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra" name="Maharashtra">Maharashtra</option>
<option value="Manipur" name="Manipur">Manipur</option>
<option value="Meghalaya"  name="Meghalaya">Meghalaya</option>
<option value="Mizoram" name="Mizoram">Mizoram</option>
<option value="Nagaland"  name="Nagaland">Nagaland</option>
<option value="Odisha" name="Odisha">Odisha</option>
<option value="Punjab" name="Punjab">Punjab</option>
<option value="Rajasthan" name="Rajasthan">Rajasthan</option>
<option value="Sikkim" name="Sikkim">Sikkim</option>
<option value="Tamil Nadu" name="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana" name="Telangana">Telangana</option>
<option value="Tripura" name="Tripura">Tripura</option>
<option value="Uttar Pradesh" name="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand" name="Uttarakhand">Uttarakhand</option>
<option value="West Bengal" name="West Bename>West Bengal"></option>
  </select><span id="sstate"></span>
    
  </div>
  <div class="col-6">
  <label for="moblie">City</label>
    <input type="text" class="form-control" placeholder="City" id="city" name="city"><span id="scity"></span>
    
  </div>
    
  </div>
  <div class="form-row">
  <div class="col-6">
  <label for="moblie">Password</label>
    <input type="password" class="form-control" placeholder="Passowrd" id="password" name="password" onkeyup="pAssword()"><span id="spassowrd"></span>
    
  </div>
  <div class="col-6">
  <label for="moblie">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" >
    
  </div>
  </div>
  <div class="form-row">
    <div class="col-5"></div>
    <div class="col-2">
    <button type="submit" id="button2" name="submitt">Sign Up</button>
    </div>
    <div class="col-5"></div>
  </div>

</form>
        </div>
      </div>
      <script>
       function fName(){

        
        var fname = document.getElementById('fname').value;
        if(!/^[A-z ]+$/.test(fname))
        {
          document.getElementById('ssname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
          document.getElementById('ssname').innerHTML = "";
          
        }

       }
       function mName()

       {
        var mname = document.getElementById('mname').value;
        if(!/^[A-z ]+$/.test(mname))
        {
          document.getElementById('ssmname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
          document.getElementById('ssmname').innerHTML = "";
        } 
       }
       function lName(){
        var lname = document.getElementById('lname').value;
        if(!/^[A-z ]+$/.test(lname))
        {
          document.getElementById('sslname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
          document.getElementById('sslname').innerHTML = "";
        }

       }
       function mObile(){
        var moblie = document.getElementById('mobile').value;
        if(!/^[0-9 ]+$/.test(moblie))
        {
          document.getElementById('ssmoblie').innerHTML = "only number allowed";
          return false
        }
        else{
          document.getElementById('ssmoblie').innerHTML = "";
         
        }
        if(moblie.length<10 || moblie.length>10)
        {
          document.getElementById('ssmoblie').innerHTML = "only 10 alpahabat allowed";
          return false
        }
        else{
         
        }
       }
       function dOb(){
        var dob = document.getElementById('dob').value;
        if(dob ==""){
          alert("kcf");
          document.getElementById('sdob').innerHTML = "Enter your dob";
          return false
        }else{

         document.getElementById('sdob').innerHTML = "";
        }
        var Bdate = document.getElementById('dob').value;
        var Bday = +new Date(Bdate);
        alert(~~ ((Date.now() - Bday) / (31557600000)));
        if(~~ ((Date.now() - Bday) / (31557600000))<18){
     
     document.getElementById('ppppppp').innerHTML = "age must be  18+";
       return false
   }else{
    document.getElementById('ppppppp').innerHTML = "";
  
    
    
   }

       }

       function eMail(){
        var semail = document.getElementById('semail').value;
        if(! /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(semail)){
               document.getElementById('ssemail').innerHTML = "enter valid email";
              return false
           }else{
            document.getElementById('ssemail').innerHTML = "";
           }
       }
       function pAssword(){
        var password = document.getElementById('password').value;
        var numbers = /[0-9]/g;
       if(!numbers.test(password)){
       
       document.getElementById('spassowrd').innerHTML = "Enter 1 number also";
       return false
       }else{
        document.getElementById('spassowrd').innerHTML = "";
        
       }
      
       var upperCaseLetters = /[A-Z]/g;
      //  var lowerCaseLetters = /[a-z]/g;
       if(!password.match(upperCaseLetters)){
        
        document.getElementById('spassowrd').innerHTML = "enter 1 Uppercase Letter email";
         return false
       }else{
        document.getElementById('spassowrd').innerHTML = "";
       }
      if(password.length<8){
       
        document.getElementById('spassowrd').innerHTML = "Password length must be 8 or greater";

        return false
      }else{
       
      }
      var regExp = /[@#$%&]/
      if(!password.match(regExp)){
        
        document.getElementById('spassowrd').innerHTML = "Use 1 special character";
        return false
      }else{
        document.getElementById('spassowrd').innerHTML = "";
       
      }
       }

      </script>
      <script>
        function signUp(){
          var dob = document.getElementById('dob').value;
          var fname = document.getElementById('fname').value;
          var mname = document.getElementById('mname').value;
          var lname = document.getElementById('lname').value;
          var moblie = document.getElementById('mobile').value;
          var dob = document.getElementById('dob').value;
          var city = document.getElementById('city').value;
          var semail = document.getElementById('semail').value;
          var password = document.getElementById('password').value;
          var state = document.getElementById('state').value;
          var country = document.getElementById('scoun').value;
        //   if(!/^[A-z ]+$/.test(user)){
        //      document.getElementById('ssname').innerHTML = "only alpahabat allowed";
        //      return false
              
        //   }else{
        //     document.getElementById('ssname').innerHTML = "";
        //   }
         


        // }
        // var fname = document.getElementById('fname').value;
        // var mname = document.getElementById('mname').value;
        //   var lname = document.getElementById('lname').value;
        //   var moblie = document.getElementById('moblie').value;
        
        // if(!/^[A-z ]+$/.test(fname)){
        //      document.getElementById('ssname').innerHTML = "only alpahabat allowed";
        //      alert("fhf");
        //      return false
              
        //   }else{
        //     document.getElementById('ssname').innerHTML = "";
        //   }
        //  alert("dokr");
        //  return false
        
        if(!/^[A-z ]+$/.test(fname))
        {
          document.getElementById('ssname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
          
        }
        
        if(!/^[A-z ]+$/.test(mname))
        {
          document.getElementById('ssmname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
         
        }
        if(!/^[A-z ]+$/.test(lname))
        {
          document.getElementById('sslname').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
         
        }
        if(!/^[0-9 ]+$/.test(moblie))
        {
          document.getElementById('ssmoblie').innerHTML = "only number allowed";
          return false
        }
        else{
         
        }
        if(moblie.length<10 || moblie.length>10)
        {
          document.getElementById('ssmoblie').innerHTML = "only 10 number allowed";
          return false
        }
        else{
         
        }
        if(! /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(semail)){
               document.getElementById('ssemail').innerHTML = "enter valid email";
              return false
           }else{
            document.getElementById('ssemail').innerHTML = "";
           }

           if(!/^[A-z ]+$/.test(city))
        {
          document.getElementById('scity').innerHTML = "only alpahabat allowed";
          return false
        }
        else{
        
        }
        if(dob ==""){
          alert("kcf");
          document.getElementById('sdob').innerHTML = "Enter your dob";
          return false
        }else{

         document.getElementById('sdob').innerHTML = "";
        }
        var Bdate = document.getElementById('dob').value;
        var Bday = +new Date(Bdate);
        alert(~~ ((Date.now() - Bday) / (31557600000)));
        if(~~ ((Date.now() - Bday) / (31557600000))<18){
     
     document.getElementById('ppppppp').innerHTML = "age must be  18+";
       return false
   }else{
    document.getElementById('ppppppp').innerHTML = "";
  
    
    
   }
        
     
      
        if (state == "") {
          
          document.getElementById('sstate').innerHTML = "choose your state";
          return false

        }else{
          
        }

        if (country == "") {
         
          document.getElementById('ssss').innerHTML = "choose your state";
          return false

        }else{
         
        }
      
      
       var numbers = /[0-9]/g;
       if(!numbers.test(password)){
       
       document.getElementById('spassowrd').innerHTML = "Enter 1 number also";
       return false
       }else{
        document.getElementById('spassowrd').innerHTML = "";
        
       }
      
       var upperCaseLetters = /[A-Z]/g;
      //  var lowerCaseLetters = /[a-z]/g;
       if(!password.match(upperCaseLetters)){
        
        document.getElementById('spassowrd').innerHTML = "enter 1 Uppercase Letter email";
         return false
       }else{
        document.getElementById('spassowrd').innerHTML = "";
       }
      if(password.length<8){
       
        document.getElementById('spassowrd').innerHTML = "Password length must be 8 or greater";

        return false
      }else{
       
      }
      var regExp = /[@#$%&]/
      if(!password.match(regExp)){
        
        document.getElementById('spassowrd').innerHTML = "Use 1 special character";
        return false
      }else{
        document.getElementById('spassowrd').innerHTML = "";
       
      }
     



        }
      </script>
      <script>
          function togglePop(){
  document.getElementById("popup-2").classList.toggle("active");
  

}
      </script>

<section id="section1">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
  <li data-target="#myCarousel" data-slide-to="4"></li>
  <li data-target="#myCarousel" data-slide-to="5"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
     <h1 id="sc">Conquer</h1>
     <p id="scr">Simple Bootstrap Template</p>
  <div class="item active">
    <img src="bg1.jpg" alt="Los Angeles" style="height:500px; width: 100%;">
  </div>

  <div class="item">
    <img src="bg2.jpg" alt="Chicago" style="width:100%; height: 500px;">
  </div>

  <div class="item">
    <img src="bg3.jpg" alt="New york" style="width:100%; height: 500px;">
  </div>
  <div class="item">
    <img src="bg-2.jpg" alt="Chicago" style="width:100%; height: 500px;">
  </div>
  <div class="item">
    <img src="bg4.jpg" alt="Chicago" style="width:100%; height: 500px;">
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>
</div> 
    <!-- <div id="bg1">
        <h1 id="h1">Conquer</h1>
        
        <h4 >Simple Bootstrap Template</h4>

    </div> -->

</section>

<section id="section2">
    <div class="container">

        <div class="row">
         
            <div class="col-lg-4 mb-4 sm-4">
                <div class="card" id="ig1" >
                    <img src="img/1-1.jpg" class="card-img-top" alt="..." id="overlay">
                    <div class="con"></div>
                    <div class="card-body">
                      <h5 class="card-title">Random Topic </h5>
                      <p class="card-text">Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in. Supposing tolerably applauded or of be. Suffering unfeeling so objection agreeable allowance me of. Ask within entire season sex common far who family. As be valley warmth assure on. Park girl they rich hour new well way you. Face ye be me been room we sons fond. </p>
                      <!-- <a href="#" class="btn ">Go somewhere</a> -->
                      <button>Read more</button>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 mb-4 sm-4">
                <div class="card" id="ig2" >
                    <img src="img/1-2.jpg" class="card-img-top" alt="..." id="overlay">
                    <div class="con"></div>
                    <div class="card-body">
                      <h5 class="card-title">Random Topic</h5>
                      <p class="card-text">Do in laughter securing smallest sensible no mr hastened. As perhaps proceed in in brandon of limited unknown greatly. Distrusts fulfilled happiness unwilling as explained of difficult. No landlord of peculiar ladyship attended if contempt ecstatic. Loud wish made on is am as hard. Court so avoid in plate hence. Of received mr breeding concerns peculiar securing landlord.<span id="dots"></span> <span id="more"> Spot to many it four bred soon well to. Or am promotion in no departure abilities. Whatever landlord yourself at by pleasure of children be.</span> </p>
                      <!-- <a href="#" class="btn btn-dark">Go somewhere</a> -->
                      <button  onclick="myFunction()" id="myBtn">Read more</button>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 mb-4 sm-4">
                <div class="card" id="ig3" >
                    <img src="img/1-3.jpg" class="card-img-top" alt="..." id="overlay">
                    <div class="con"></div>
                    <div class="card-body">
                      <h5 class="card-title">Random Topic</h5>
                      <p class="card-text">Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in. Supposing tolerably applauded or of be. Suffering unfeeling so objection agreeable allowance me of. Ask within entire season sex common far who family. As be valley warmth assure on. Park girl they rich hour new well way you. Face ye be me been room we sons fond. 
                      </p>
                      <!-- <a href="#" class="btn ">Go somewhere</a> -->
                      <button >Read more</button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-lg-6 ">
              <div class="card" id="card" >
                  <img src="img/1-3.jpg" class="card-img-top" alt="..." id="img">
                  <div class="card-body" id="card-text" >
                    <h5 class="card-title">Random Topic</h5>
                    <p class="card-text">Do in laughter securing smallest sensible no mr hastened. As perhaps proceed in in brandon of limited unknown greatly. Distrusts fulfilled happiness unwilling as explained of difficult. No landlord of peculiar ladyship attended if contempt ecstatic. Loud wish made on is am as hard. Court so avoid in plate hence. Of received mr breeding concerns peculiar securing landlord. Spot to many it four bred soon well to. Or am promotion in no departure abilities. Whatever landlord yourself at by pleasure of children be. 
                    </p>
                    <!-- <a href="#" class="btn btn-dark">Go somewhere</a> -->
                  </div>
                </div>
          </div>
          <div class="col-lg-6 ">
              <div class="card" id="ro" >
                  <img src="img/1-3.jpg" class="card-img-top" alt="..." id="img1">
                  <div class="card-body" id="card-text1">
                    <h5 class="card-title">Random Topic</h5>
                    <p class="card-text">Do in laughter securing smallest sensible no mr hastened. As perhaps proceed in in brandon of limited unknown greatly. Distrusts fulfilled happiness unwilling as explained of difficult. No landlord of peculiar ladyship attended if contempt ecstatic. Loud wish made on is am as hard. Court so avoid in plate hence. Of received mr breeding concerns peculiar securing landlord. Spot to many it four bred soon well to. Or am promotion in no departure abilities. Whatever landlord yourself at by pleasure of children be. 
                    </p>
                    <!-- <a href="#" class="btn btn-dark">Go somewhere</a> -->
                  </div>
                </div>
          
      </div>
  </div>
 
    

</section>

<section id="section3">


<!-- <div id="videoDiv2"> 
<div id="videoBlock2">  
<img src="https://www.imi21.com/wp-content/uploads/2016/11/t12.jpg" id="videosubstitute" alt="">
<video id="video2"  preload autoplay muted playsinline loop>
<source src="video.webm" type="video/webm">
<source src="video.mp4" type="video/mp4">
</video> 
<div id="videoMessageBox2">
    <div id="videoMessage2">
      <div id="bg">
        <h1 class="spacer">Our Services</h1>
        <h2 class="spacer"> securing smallest sensible no mr hastened. As perhaps proceed in in brandon of limited unknown greatly. Distrusts fulfilled happiness unwilling as</h2>
        
      </div> -->
      <!-- <div class="container">
        <div class="row" id="row">
           <div class="col-12" >
            <video autoplay muted loop  >
              <source src="video.mp4" type="video/mp4">
            </video>
            <div class="content">
              <h1 id="vi">OUR SERVICE</h1>
              <p id="vid">bthis  fih diuh riu ufif dso odg gofi gho gpb xp vp  p gdp bgpd g opnb gp n  [nb n[ gh[nn no[n o;pbb op po;khg;p bopijn ogpm </p>
            </div>
           </div>
              
        </div>
    </div> -->
    <div class="big">
   <div class="container">
     <div class="row">
       <div class="col-12" >
         <h1 id="bigg">OUR SERVICE</h1>
         <p id="para">Do in laughter securing smallest sensible no mr hastened. As perhaps proceed in in brandon of limited unknown greatly. Distrusts fulfilled happiness unwilling as explained of difficult. No landlord of peculiar ladyship attended if contempt ecstatic. Loud wish made on is am as hard. Court so avoid in plate hence. Of received mr breeding concerns peculiar securing landlord. Spot to many it four bred soon well to. Or am promotion in no departure abilities. Whatever landlord yourself at by pleasure of children be.</p>
       </div>
     </div>
   </div>
    </div>
        
        <!-- <p class="videoClick2">
            <a href="2017-website-tarifs.php">Click for rates</a>
        </p>  -->
    </div>
</div>
</div>
</div>

<div class="container">

<div class="row">
  

  <div class="col-12">
    <div class="card" >
        <img src="img/4-5.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          
          <p class="card-text">Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in. Supposing tolerably applauded or of be. Suffering unfeeling so objection agreeable allowance me of. Ask within entire season sex common far who family. As be valley warmth assure on. Park girl they rich hour new well way you. Face ye be me been room we sons fond. 
            Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest. Course suffer to do he sussex it window advice. Yet matter enable misery end extent common men should. Her indulgence but assistance favourable cultivated everything collecting. 

          </p>
          <!-- <a href="#" class="btn btn-dark">Go somewhere</a> -->
        </div>
    </div>
      
</div>
</div>
    
</div>

<!-- <video autoplay muted loop width="1080px" height="540"  id="myVideo">
  <source src="motionplace.mp4" type="video/mp4">
</video> -->


<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="containe">
        <img src="img/1-2.jpg" alt="Avatar" class="image">
        <div class="overlay">
          <div class="text">Random Information</div>
        </div>
        </div>
    </div>
    <div class="col-6">
      
      <div class="containe">
        <img src="img/1-2.jpg" alt="Avatar" class="image">
        <div class="overlay">
          <div class="text">Random Information</div>
        </div>
        </div>
    </div>
  </div>
</div>
 
</section>
   
<section id="section4">
    <div class="container">
        <div class="row">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f64c72" fill-opacity="1" d="M0,288L720,32L1440,288L1440,320L720,320L0,320Z"></path></svg>
        
        <div class="col-12" id="color" >
         
          <h3>Contact us</h3>
          <p id="pform">
           Nunc diam leo, fringilla vulputate elit lobortis, consectetur vestibulum quam. Sed id
           felis ligula. In euismod libero at magna dapibus, in rutrum velit lacinia.
           Etiam a mi quis arcu varius condimentum.
          </p>
          
        </div>
      </div>
      <div class="row" id="color">
        <form onsubmit="return validation()" method="POST" action="index.php">
          <div class="form-group">
            <div class="row">
              <div class="col-6">

                <input class="form-control form-control-sm" type="text" placeholder="**Name" id="name" name="name1" onkeydown="nAmE()"><span id="fullname" ></span>
                <input class="form-control form-control-sm" type="text" placeholder="**Email"  id="email" name="email1" onkeydown="EmaIl()" ><span id="em"></span>
                <input class="form-control form-control-sm" type="text" placeholder="**Subject" id="nonnn" name="subject1"><span id="subject"></span><br>
                <!-- <textarea name="message" rows="7" class="form-control" id="comment" placeholder="**Your message here..." ></textarea><span id="ar"></span>
                <input type="text" name="textarea1"  placeholder="**Your message here..." id="comment"> -->
                <button type="submit" id="button2" name="submit">Send</button>
                
              </div>
              <div class="col-6">
                <textarea name="message" rows="7" class="form-control" id="comment" placeholder="**Your message here..." onkeypress="hello()"></textarea><span id="ar"></span>
                 <span class="hint" id="textarea_message"></span>
               
               <div class="area">
                <span id="current">0</span>
                <span id="maximum">/ 1500</span>
               </div>
              </div>
            </div>
           
        </form>
        </div>
        </div id="svg">
    </div>
</section>
    <footer class="site-footer">
      <p>Copyright © 2020 Pushpraj Private Limited</p>

    </footer>
    </main>
    <!-- <script>
         
  document.getElementById("popup-1").classList.toggle("active");

      </script> -->
      <script>
        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
      </script>

       <script>
          function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
  document.getElementById("g").style.display ="none";
}
      </script>
     <script>
          $('textarea#comment').on('keyup',function() 
{
  var maxlen = $(this).attr('maxlength');
  
  var length = $(this).val().length;
  if(length < 150 ){
    $('#textarea_message').text('Minimum 150 characters!')
  }
  else
    {
      $('#textarea_message').text('');
    }
});
     </script>
      <script>
          function nAmE(){
            var user = document.getElementById('name').value;
            if(!/^[A-z ]+$/.test(user)){
             document.getElementById('fullname').innerHTML = "only alpahabat allowed";
              
          }else{
            document.getElementById('fullname').innerHTML = "";
          }


          }
          function EmaIl(){
            var email = document.getElementById('email').value;
            if(! /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)){
               document.getElementById('em').innerHTML = "enter valid email";
              
           }else{
            document.getElementById('em').innerHTML = "";
           }
          


          }
      </script>
    <script>
        function validation(){
           
            var user = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var subject = document.getElementById('nonnn').value;
            var textp = document.getElementById('comment').value;
             
//    return /^[A-z ]+$/.test(user);
          if(!/^[A-z ]+$/.test(user)){
             document.getElementById('fullname').innerHTML = "only alpahabat are allowed";
              return false
          }
           if(user==""){
               document.getElementById("fullname").innerHTML ="Please enter your name.";
               return false
           }
           if(email==""){
               document.getElementById("em").innerHTML ="Please enter your email.";
               return false
           }
           if(subject==""){
               document.getElementById("subject").innerHTML ="Please enter subject.";
               return false
           }
           if(! /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)){
               document.getElementById('em').innerHTML = "enter valid email";
               return false
           }
           if((textp.length<=150) ||(textp.length > 1501)){
               document.getElementById('ar').innerHTML ="min. length 150 and max. 1500 are allowed";
               return false
           }
      
        }
    </script>
     <script>
      function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
      
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
      }
      }
      </script>
       <script>
        $('textarea').keyup(function() {
       
       var characterCount = $(this).val().length,
           current = $('#current'),
           maximum = $('#maximum'),
           theCount = $('#the-count');
         
       current.text(characterCount);
      
       
       /*This isn't entirely necessary, just playin around*/
       if (characterCount < 70) {
         current.css('color', '#666');
       }
       if (characterCount > 70 && characterCount < 90) {
         current.css('color', '#6d5555');
       }
       if (characterCount > 90 && characterCount < 100) {
         current.css('color', '#793535');
       }
       if (characterCount > 100 && characterCount < 120) {
         current.css('color', '#841c1c');
       }
       if (characterCount > 120 && characterCount < 139) {
         current.css('color', '#8f0001');
       }
       
       if (characterCount >= 140) {
         maximum.css('color', '#8f0001');
         current.css('color', '#8f0001');
         theCount.css('font-weight','bold');
       } else {
         maximum.css('color','#666');
         theCount.css('font-weight','normal');
       }
       
           
     });
      </script>
       <script>
     
     jQuery(function($) {
var module =  {
  // global element settings
  settings: {
    item: $('.main-nav__item'), // li
    link: $('.main-nav__link'), // a
    current: $('.main-nav__item--active'), // active
    active: $('.main-nav__active'), // underline
    headerHeight: $('header').outerHeight() // header (for calculations)
  },

  init: function() {
    var _ = this;

    _.activePlacement(_.settings.current); // default active state

    _.settings.link.hover(function() {
      // on hover, move active to hovered element
      _.activePlacement($(this));
    }, function() {
      // on mouse out, move active to current element
      _.activePlacement($('.main-nav__item--active'));
    });

    // on click
    _.settings.link.click(function(e) {
      e.preventDefault();
      var $this = $(this),
        $parent = $this.parent('.main-nav__item'),
        $href = $this.attr('href'),
        target = $($href).position().top;

      $(window).off('scroll'); // temporarily disable scrolling events

      _.activePlacement($parent);
      _.activeClass($parent);

      $('body, html').stop().animate({
        scrollTop: target - _.settings.headerHeight
      }, 500, function() {
        $(window).on('scroll', function() {
          _.onScroll(_); // re-enable scrolling events
        });
      });
    });

    $(window).on('scroll', function() {
      _.onScroll(_); // initiate scroll listener
    });

  },

  activePlacement: function(current) {
    // handles positioning of the active underline
    var _ = this,
      pos = current.position(),
      w = current.outerWidth();

    _.settings.active.css({
      'left': pos.left,
      'width': w
    });
  },

  activeClass: function(parent) {
    // handles maintenance of the currently active class
    var _ = this;

    _.settings.item.removeClass('main-nav__item--active'); // remove all active classes
    parent.addClass('main-nav__item--active'); // place active class on current item
  },

  onScroll: function(_) {
    // handles scrolling events
    var scrollPosition = $(document).scrollTop();

    _.settings.link.each(function() {
      var $this = $(this),
        $parent = $this.parent('.main-nav__item'),
        target = $($this.attr("href"));

      // repurposed logic from https://stanhub.com/sticky-header-change-navigation-active-class-on-page-scroll-with-jquery/
      if ((target.position().top - _.settings.headerHeight) <= scrollPosition &&
        (target.position().top - _.settings.headerHeight + target.height()) > scrollPosition) {
        _.activePlacement($this);
        _.activeClass($parent);
      }
    });
  },

  destroy: function() {
    // destroy
  }
};

module.init();
});
 </script> 
</body>
</html>