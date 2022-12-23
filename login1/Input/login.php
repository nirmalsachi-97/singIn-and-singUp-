 <?php
// //Add db filled
// require_once "./db.php";

// //add validation fille
// require_once "./validation.php";

// //if user clicked the login button

// if(isset($_POST["login"])){
//     //get from input data
//     $email = $_POST["email_id"];
//     $pass = $_POST["password"];

//     //input walidation
//     if(inputEmptyLogin($email,$pass)){
//         header("Location : ../index.php?err=empty_input" );
//     }
//     else if(emailInvalid($email)){
//         header("Location : ../index.php?err=invalid_email" );
//     }
//     else if(passwordInvalid($pass) ){
//         header("Location : ../index.php?err=invalid_password" );
//     }
//     else
//     {
//     //all inputs error free pass
//     loginUser($conn,$email,$pass);
//     }

// }else{
//     header("Location : ../index.php");
//     exit();
// }

// //function call loginUser function
// function  loginUser($conn,$email,$pass){
//     //Query
//     $sql = "SELECT * FROM register_table WHERE email_id =? ;";
    
//     //Initialize prepare statement
//     $stmt= mysqli_stmt_init($conn);
//     //Bind the statement with the queary and check error
//     if(!mysqli_stmt_prepare($stmt,$sql)){
//         header("Location:../index.php?err=failedstart");
//         exit();
//     }
//     else{
//         //bIND data with the statement
//         mysqli_stmt_bind_param($stmt,"s",$email);
//         //execute the statement
//         mysqli_stmt_execute($stmt);
//         //save result avalible
//         $data = mysqli_stmt_get_result($stmt);
//         //check if there is at least are result
//         if($row = mysqli_fetch_assoc($data)){
//             //get encript passwords
//             $passHashed = $row["password"] ;
//             //verfy password
//             $isPassOk = password_verify($pass,$passHashed);
//             if($isPassOk){
//                 // setup sesion variable
//                 session_start();
//                 $_SESSION["user_email"]=$row["email_id"];
//                 $_SESSION["user_name"]=$row["name"];

//                 header("Location:../profile.php");
//             }
//             else{
//                 header("Location:../index.php?err=LoginFaildPass");
//                 exit();
//             }
//         }
//         else{
//             header("Location:../index.php?err=LoginFaildEmail");
//             exit();
//         }
//     }
//         // close the statement
//         mysqli_stmt_close($stmt);
//     }


// require_once "./db.php";

// //add validation fille
// require_once "./validation.php";
    
//     // If user clicks the login button
//     if(isset($_POST["login"])){
//         // Get form input data
//         $email = $_POST["email_id"];
//         $pass = $_POST["password"];
       

//         // Input validation
//         if(inputsEmptyLogin($email, $pass)){
//             header("location: ../index.php?err=empty_inputs");
//         }
//         else if(emailInvalid($email)){
//             header("location: ../index.php?err=invalid_email");
//         }
//         else if(passwordInvalid($pass)){
//             header("location: ../index.php?err=invalid_password");
//         }
//         else{
//             // If all inputs are error free
//             loginUser($conn, $email, $pass);
//         }
//     }
//     else{
//         header("location: ../index.php");
//         exit();
//     }

//     // Function for login
//     function loginUser($conn, $email, $pass){
//         // Query
//         $sql = "SELECT * FROM register_table WHERE email_id = ?;";
//         // Initialize the prepared statement
//         $stmt = mysqli_stmt_init($conn);
//         // Bind the statement with the query and check errors
//         if(!mysqli_stmt_prepare($stmt, $sql)){
//             header("location: ../index.php?err=failedstmt");
//         }
//         else{
//             // Bind data with the statement
//             mysqli_stmt_bind_param($stmt, "s", $email);
//             // Execute the statement
//             mysqli_stmt_execute($stmt);
//             // Save results if available
//             $data = mysqli_stmt_get_result($stmt);
//             // Check if there is at least one result
//             if($row = mysqli_fetch_assoc($data)){
//                 // Get encrypted password
//                 $pass = $row["password"];
//                 // Verify password
//                 $isPassOk = password_verify($pass, $pass);
//                 if($isPassOk){
//                     // Setup session variables
//                     session_start();
//                     $_SESSION["user_email"] = $row["email_id"];
//                     $_SESSION["user_name"] = $row["name"];
                

//                     // // If remember me checked
//                     // if(isset($remember)){
//                     //     // Create cookies for email and password
//                     //     setcookie("emailcookie", $email, time() + (3600 * 24 * 7), "/");
//                     //     setcookie("passwordcookie", $pass, time() + (3600 * 24 * 7), "/");
//                     // }
//                     // else{
//                     //     // Destroy cookies value
//                     //     if(isset($_COOKIE["emailcookie"])){
//                     //         setcookie("emailcookie", "", time() - (3600 * 24 * 7), "/");
//                     //     }
//                     //     if(isset($_COOKIE["passwordcookie"])){
//                     //         setcookie("passwordcookie", "", time() - (3600 * 24 * 7), "/");
//                     //     }
//                     // }

//                     header("location: ../profile.php");
//                 }
//                 else{
//                     header("location: ../index.php?err=loginfailedpass");
//                     exit();
//                 }
//             }
//             else{
//                 header("location: ../index.php?err=loginfailedemail");
//                 exit();
//             }
//         }
//         // Close the statement
//         mysqli_stmt_close($stmt);
//     }

session_start();

$connection=mysqli_connect('localhost','root','');
//$connection=mysqli_connect('localhost','root','write your password here')

mysqli_select_db($connection,'studentid');

$email=$_POST['email_id'];
$password=$_POST['password'];

$select="select * from register_table where email_id='$email' && password='$password'";
$result=mysqli_query($connection,$select);
$num=mysqli_num_rows($result);
if($num==1)
{
    header('location:../profile');
}
else
{
    header('location:../index.php');
}


?>


