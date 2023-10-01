<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=array();
    //validate name
    if(empty($_POST['name'])){
        $errors[] ="Enter your name";
    }
    else {
       $name= $_POST['name'];
    }
    
    //validate email
    if(empty($_POST['email'])){
        $errors[] ="Enter your email";
    }
    else {
       $email= $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[]="invalid email format";
        }
    }
    //validate message
    if(empty($_POST['message'])){
        $errors[] ="Enter your message here";
    }
    else {
        $message= $_POST['message'];
    }
    //submiting form data
    if(empty($errors)){
     $stmt = $conn -> prepare("insert into contact(name,email,message)VALUES(?,?,?)");
     $stmt -> bind_param("sss", $name,$email,$message);
     $stmt ->execute();
     $stmt ->close();
     echo "submitted succesfully";
     header("Location: submission.html");
    }
    else{
        echo "<h1>Errors:</h1>;
        <p>These erros occured: <br>";
        foreach($errors as $msg){
            echo "$msg <br>";
        }
        echo " </p> <p>Please try again</p>";
        header("Location: contact.html");
    }
}
?>