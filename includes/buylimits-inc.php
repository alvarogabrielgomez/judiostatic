<?php

$sql = "SELECT client_id FROM clients WHERE client_email = ? AND active = 1";

$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    $data['response'] = "error"; 
    $data['content'] = "SQL ERROR.";
}
else{
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)){
        $client_id  = $row['client_id'];
        $sql = "SELECT * FROM buylimits WHERE client_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $data['response'] = "error"; 
            $data['content'] = "SQL ERROR.";
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $client_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                
            }
            else{

            }
        }


    }
}
