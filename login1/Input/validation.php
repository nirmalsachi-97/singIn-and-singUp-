<?php
//function to validate input


//check input are empty
function imputEmpytRegister($name,$email,$pass){
    $value ;
    if(empty($name) || empty($email) || empty($pass)){
        $value = true ;
    }else{
        $value = false ;
    }
    return $value ;
}
// check if login input empty
function inputsEmptyLogin($email,$pass){
    $value ;
    if( empty($email) || empty($pass)){
        $value = true ;
    }else{
        $value = false ;
    }
    return $value ;
}

//check input are invalid name
function nameInvalid($name){
    $value;
    if(!preg_match('/^[a-zA-Z]+$/',$name)){
        $value = true ;
    }else{
        $value = false ;
    }
    return $value ;
}
    //check input are invalid email
function emailInvalid($email){
    $value;
    if(!preg_match('/^[a-zA-Z\d\._-]+@[a-zA-Z\d\._-]+\.[a-zA-Z\d\.]{2,}$/',$email)){
        $value = true ;
    }else{
        $value = false ;
    }
    return $value ;
}
   //check input are invalid password
   function passwordInvalid($pass){
    $value;
    if(!preg_match('/^.{5,}$/',$pass)){
        $value = true ;
    }else{
        $value = false ;
    }
    return $value ;
}
  //check eamil acvailerble syaytem
  function emailAvailable($conn,$email){
    $value;
    // Query 
    $sql = "SELECT * FROM register_table WHERE email_id = ? ;";
    //Initialize prepare statement
    $stmt= mysqli_stmt_init($conn);
    //Bind the statement with the queary and check error
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../index.php?err=failedstmt");
        exit();
    }
    else{
        //bIND data with the statement
        mysqli_stmt_bind_param($stmt,"s",$email);
        //execute the statement
        mysqli_stmt_execute($stmt);
        //save result if awalable
        $data = mysqli_stmt_get_result($stmt); 
        // check if there is at least one result set
                if(!mysqli_fetch_assoc($data)){
                    $value = false;
                }
                else{
                    $value= true;
                }
    }
    //close the statement
    mysqli_stmt_close($stmt);
    return $value;
}

?>