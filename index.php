<?php 
 $firstname=$name=$email=$phone=$message="";
 $firstnameError=$nameError=$emailError=$phoneError=$messageError="";
 $isSuccess="false";
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
     $firstname=verifyInput($_POST["firstname"]); 
     $name=verifyInput($_POST["name"]);
     $email=verifyInput($_POST["email"]);
     $phone=verifyInput($_POST["phone"]);
     $message=verifyInput($_POST["message"]);
     $isSuccess=true;
     
     if(empty($firstname))
     {
         $firstnameError="je veux votre prenom s'il vous plait";
         $isSuccess="false";
     }
     if(empty($name))
     {
        $nameError="je veux votre nom s'il vous plait";
        $isSuccess="false";
    }
    }
     if(empty($message))
     {
         $messageError="je veux votre message s'il vous plait";
         $isSuccess="false";
    }
    if(!IsEmail($email))
    {
        $emailError=" t'essaie de me rouler ,ton email stp!";
        $isSuccess="false";
    }
    if(!isPhone($phone)){
        $phoneError= "Que des chiffres et des espaces svp!";
        $isSuccess="false";
    }
      
    function IsEmail($var)
    {
        return filter_var($var,FILTER_VALIDATE_EMAIL);
    }
    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var);
    }
 
 function verifyInput($var)
 {
     $var= trim($var);
     $var= stripslashes($var);
     $var= htmlspecialchars($var);

     return($var);

 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family-lato"rel="stylesheet"type="text/css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Contactez-moi</title>
</head>
<body>
    <div class ="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"id="contact-form"method="post"role="form">
                    <div class="row">
                        <div class=col-md-6>
                        <label for="firtstname">Prenom<span class="blue">*</span></label>
                        <input type="text"  id ="firstname"name="firstname" class="form-control"placeholder="votre prenom"value="<?php echo $firstname?>">
                        <p class="comments"><?php echo $firstnameError ?></p>
                    </div>

                    <div class=col-md-6>
                        <label for="name">Nom<span class="blue">*</span></label>
                        <input type="text" id ="name"name="name" class="form-control"placeholder="votre nom"value="<?php echo $name?>">
                        <p class="comments"><?php echo $nameError ?></p>
                    </div>

                    <div class=col-md-6>
                        <label for="email">Email<span class="blue">*</span></label>
                        <input type="email" id ="email"name="email" class="form-control"placeholder="votre email"value="<?php echo $email?>">
                        <p class="comments"> <?php echo $emailError ?></p>
                    </div>

                    <div class=col-md-6>
                        <label for="phone">Téléphone<span class="blue">*</span></label>
                        <input type="tel" id ="phone"name="phone" class="form-control"placeholder="votre tel"value="<?php echo $phone?>">
                        <p class="comments"> <?php echo $phoneError ?></p>
                    </div>

                    <div class=col-md-12>
                        <label for="message">message<span class="blue">*</span></label>
                        <textarea type="text"id="message"name="message"class="form-control"placeholder="votre message"rows="4"><?php echo $message ?></textarea>
                        
                        <p class="comments"><?php echo $messageError ?></p>

                    </div>

                    <div class=col-md-12>
                        <p class="blue">*Ces informations sont requises</p>
                    </div>
                    <div class=col-md-12>
                        <input type="submit" class="button1"value="envoyer">
                        <p class="thanks"style="display:<?php if($isSuccess) echo 'block'; else echo'none';?>"> votre message a bien été envoyé! ,merci de votre visite</p>
                    </div>
                   
                                       
                </form>
            </div>
        </div>
 </div>
</body>
</html>
