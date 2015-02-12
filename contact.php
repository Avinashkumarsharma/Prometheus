<?php
$mail_to="contact@prometheus.iecsemanipal.com";
$subject="Prometheus contact";
$status="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!isset($_POST['name']) ||
       !isset($_POST['email']) ||
       !isset($_POST['msg'])) {
        $status="All fields Required";
        
    } else {
    $mail=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $msg=filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
    if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
        //send mail;
        $headers = 'From: '.$mail."\r\n".'Reply-To: '.$mail."\r\n" .'X-Mailer: PHP/'.phpversion();
        $check=mail($mail_to, $subject, $msg, $headers); 
        if($check)
            $status = "Message sent";
        else
            $status = "Error Sending Message ";
        }
        else {
            $status="Invalid Details";
        }
    }
    
}
else{
    $status="";
}
?>


<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prometheus|Contact-Us</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/parent.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <link rel="shortcut icon" href="http://iecsemanipal.com/Prometheus/favico.png" type="image/x-icon" />
        
        <link rel="stylesheet" href="css/contact.css" media="screen">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
         <div class="voice" id="startRecBtn" >
                <p class="vtext">Voice Commands</p>
                <p class="cmd"><span class="vheading">Click to activate. Allow Microphone when asked.</span><br><br> speak to type msg It works 70% percent of the time, so be good.
                </p>
              </div>
         <header>
            <figure class="pull-left"><a href ="/index.html"><img src="img/logolight.png" alt="Prometheus"></a></figure>
                <ul class="nav">
                    <li><a href="index.html">home</a></li>
                    <li><a href="about.html">about</a></li>
                    <li><a href="events.html">events</a></li>
                    <li><a href="schedule.html">schedule</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>
            </header>
        <div id="container">
        <caption class="text"><h1>Contact <span>Us</span></h1></caption>
            <div id="wrapper">
                <form method="post" action="contact.php">
                <table>
                <tr>
               <td> <label for="name" >name</label> </td>
               <td> <input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
               <td><label for="email">email</label></td>
                <td><input type="email" id="email" name="email" required></td>
                </tr>
                 </table>
                <textarea rows="10" cols ="50" placeholder="message here" name="msg" id="msg" required></textarea>
                <span  class="olive"><?php echo $status ?></span><input type="submit" name="submit" id="submit" value="Send"/>
                </form>
            </div>
            <script src="js/contact-speech.js"></script>
            <footer>
            <p>Phone:8867600811</p>
            </footer>
        </div>
        </body>
    </html>