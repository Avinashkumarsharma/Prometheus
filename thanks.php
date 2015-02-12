<?php
session_start();
$error=true;
$delno;
$mail_from="contact@iecsemanipal.com";
	include_once "validate.php";
	include_once "model.php";
	$field=array("name","reg","email","pno");
    if($_SERVER['REQUEST_METHOD']=='POST' && (!empty($_REQUEST['captcha']))){
        function register($c){
			GLOBAL $field;
			GLOBAL $error;
            GLOBAL $delno;
            GLOBAL $mail_from;
            $subject = "Prometheus Delegate Card number";
			$name=$_POST["name"];
			$reg=$_POST["reg"];
			$email=$_POST["email"];
			$phno=$_POST["pno"];
			$vali=new Validate($_POST,$field);
		if($vali->check() && trim(strtolower($_REQUEST['captcha'])) == $_SESSION['captcha']){
            $delno=$c->tables(array("prom_reg"))->getLastID()+1000;
            $check=$c->tables(array("prom_reg"))
				->attr(array("name","reg","email","pno","del"))
				->insert(array($name,$reg,$email,$phno,$delno));
                $msg="Your Delegate card number is ".$delno;
               if($check){
					$error=false;
					//$headers = "From: ".$mail_from."\r\n".'Reply-To: '.$mail_from."\r\n".'X-Mailer: PHP/'.phpversion();
                                        $headers = 'From: contact@prometheus.iecsemanipal.com' . "\r\n" .
                                        'Reply-To: contact@prometheus.iecsemanipal.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();
                                        $m=mail($email, "Prometheus Delegate Card Details", $delno, $headers);
                                        if($m){
                                           //echo "Mail Sent";  
                                           }
				}
				else{
					$error=true;
				}
        }else{
            $error = true;
        }
        }
        register($c);
    }else{
    header('Location:index.html');
    }
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prometheus|Thank You</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/parent.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" href="css/thanks.css" media="screen">
        <link rel="shortcut icon" href="http://iecsemanipal.com/Prometheus/favico.png" type="image/x-icon" />
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
         <header class="shadow" class="hidden">
            <figure class="pull-left"><a href ="/"><img src="img/logolight.png" alt="Prometheus"></a></figure>
                <ul class="nav">
                    <li><a href="index.html">home</a></li>
                    <li><a href="about.html">about</a></li>
                    <li><a href="events.html">events</a></li>
                    <li><a href="schedule.html">schedule</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>
            </header>
        <div id="container">
            <section class="text-center">
                <?php if(!$error) {?>
                <p>Your Delegate Card no is:</p>
                <h1 id="delno" class="font-square orange"><?php echo $delno ?></h1>
                 <p>Thank You for registering.Please make sure to collect your delegate card brochure from our infodesk at KC</p>
                 <p>Make sure to follow our <a style="color:orange;" href="https://www.facebook.com/pthes" target="_blank">Facebook page</a></p>
                 <p>to stay updated about the events and timings!</p>
                <?php } else { ?>
                <p>oops! Something went Wrong</p>
                <h1 id="delno" class="font-square orange">Error</h1>
                <p>Duplicate Entry or incorrect captcha</p>
                <a href="register.html" class="olive">Try again</a>
                <?php } ?>
            </section>
        </div>
        </body>
    </html>