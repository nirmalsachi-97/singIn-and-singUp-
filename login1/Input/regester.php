<?php
//Add db filled
require_once "./db.php";

//add validation fille
require_once "./validation.php";

//if user click the register button

if(isset($_POST["register"])){
    //get form data from
    $name = $_POST["name"];
    $email = $_POST["email_id"];
    $pass = $_POST["password"];

    //input validation function
    if(imputEmpytRegister($name,$email,$pass)){
        header("Location:../index.php?err=empty_input");
        // exit();
    }
    else if(nameInvalid($name)){
        header("Location:../index.php?err=invalid_username");
    }
    else if(emailInvalid($email)){
        header("Location:../index.php?err=invalid_email");
    }
    else if(passwordInvalid($pass)){
        header("Location:../index.php?err=invalid_password");
    }
    // reEnter password check
    // else if(passNoMatch($pass,$re_password)){
    //     header("Location:../index.php?err=empty_input");
    // }
    else if(emailAvailable($conn,$email)){
        header("Location:../index.php?err=available_email");
    }

        //all input are error free
    else{
     registerUser($conn,$name,$email,$pass);
        echo "succes";
        
    }
}
else{
    header("Location:../index.php");
    exit();
}
    //founction for register new user
    function registerUser($conn,$name,$email,$pass){
        $sql = "INSERT INTO register_table(name,email_id,password) VALUE (?, ?, ?)";

        //pasword encryption
        // $passHashed =password_hash($pass, PASSWORD_DEFAULT);

        $stmt= mysqli_stmt_init($conn);
    //Bind the statement with the queary and check error
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../index.php?err=failedstart");
        exit();
    }
    else{
        //bIND data with the statement
        mysqli_stmt_bind_param($stmt,"sss",$name,$email,$pass);
        //execute the statement
        mysqli_stmt_execute($stmt);
        // close the statement
        mysqli_stmt_close($stmt);

        header("Location:../index.php?err=noerrors");
    }
    }
?>