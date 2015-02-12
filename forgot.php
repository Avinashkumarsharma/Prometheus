<?php
	include_once "model.php";
	$field=array("email");
    $name="";
    $delno="";
    $error=false;
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["email"])){
        function register($c){
			GLOBAL $name;
			GLOBAL $error;
            GLOBAL $delno;
			$email=$_POST["email"];
		if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $details=$c->tables(array("prom_reg"))->getDelAndName($email);
               if($details){
					$error=false;
                    $name = $details["name"];
                   $delno = "Del No. ".$details["del"];
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
        
    }
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prometheus|Retrieve Del Card Number</title>
        <meta name="description" content="Forgot Delegate Card No? Get It from here">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/parent.css">
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
                    <li><a href="register.html">Register</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>
            </header>
        <div id="container">
            <section class="text-center">
                <form method="post" action="forgot.php" id="ret">
                    <input type="email" name="email" id="fdel" placeholder="Enter email used to register"><br><br>
                    <input type="submit" value="Submit" id="submit" />
                </form>
                <div id="description">
                <?php if(!$error) {?>
                <p id="name"><?php echo  $name ?></p>
                <p id="delno"><?php echo $delno ?></p>
                <?php } else {?>
                <p>Error! This email is not registered. <br> Contact Admin</p>
                    <?php } ?>
                </div>
            </section>
        </div>
        </body>
    </html>