<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Le Nome est requis ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email est requis";
} else {
    $email = $_POST["email"];
}




// Phone Number
if (empty($_POST["phone_number"])) {
    $errorMSG .= "Numero est requis ";
} else {
    $phone_number = $_POST["phone_number"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message est required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "pedanew504@wnpop.com";

$Subject = "Nouveau Message Arrivé";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "\n";
$Body .= "Phone Number: ";
$Body .= $phone_number;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
$txtName = $_POST['name'];
$txtEmail = $_POST['email'];
$txtPhone =$_POST['phone_number'];

$txtMessage = $_POST['message'];

if(isset($_POST['name']))
{

$con = mysqli_connect('localhost', 'root', '','contactdb');

$sql = "INSERT INTO `contactus` ( `name`, `email`,`phone_number`,  `message`) VALUES ( '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Votre Message a été envoyé ";
}
}
else
{
	echo "Etes-vous un véritable visiteur?";
	
}
?>


?>