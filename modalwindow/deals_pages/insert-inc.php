<?php
header("Content-type:application/json;charset=utf-8");
require '../../includes/dbh-inc.php';
$error=false;
$first = mysqli_real_escape_string($conn,$_POST['first']);
$last = mysqli_real_escape_string($conn,$_POST['last']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
if(empty($first) || empty($last) || empty($email)){
    $error = true;
}
if ($error == false) {

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $data['response'] = "error"; 
    $data['content'] = "Errorfully.";  
    }
    else{
        $sql = "SELECT * FROM clients WHERE client_email = '$email';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                $data['response'] = "error"; 
                $data['content'] = "Email Taken.";
            }else{

                    $sql = "INSERT INTO clients (client_first, client_last, client_email) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        $data['response'] = "error"; 
                        $data['content'] = "SQL ERROR.";
                    }
                    else{

                         mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email);
                         mysqli_stmt_execute($stmt);
                         $data['response'] = "success"; 
                         $data['content'] = "Todo bien el mio";
                         
                     }
            }
    }

}
else {
    $data['response'] = "error";
    $data['content'] = "Errorfully.";
}

echo json_encode($data);
?>



<?php
//  error_reporting(E_ALL);
//  session_start();
//  ini_set('display_errors', '1');
// function error($message){
//     header("Location: ../../deals.php?signup=".$message);
//     exit();
// }

// if( isset($_POST['signup-submit']) ){

// require '../../includes/dbh-inc.php';


//     $first = mysqli_real_escape_string($conn,$_POST['first']);
//     $last = mysqli_real_escape_string($conn,$_POST['last']);
//     $email = mysqli_real_escape_string($conn,$_POST['email']);

//     if(empty($first) || empty($last) || empty($email)){

//         error("empty");

//     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         error("mail-invalid");

//     }

//     else{
        

//         $sql = "SELECT * FROM clients WHERE client_email = '$email';";
//         $result = mysqli_query($conn,$sql);
//         $resultCheck = mysqli_num_rows($result);
//         if($resultCheck>0){
//             error('email-taken');
//         }

//         else{
//             $sql = "INSERT INTO clients (client_first, client_last, client_email) VALUES (?, ?, ?)";
//             $stmt = mysqli_stmt_init($conn);
//             if(!mysqli_stmt_prepare($stmt, $sql)){
//                 error("sqlerror");
//             }

//             else{

//                 mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email);
//                 mysqli_stmt_execute($stmt);
//                 header("Location: ./../continue-d.php?signup=success");
//                 exit();
//             }
        
//         }


        



//     }
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);


// }

// else{
//     error("invalid-source");
// }