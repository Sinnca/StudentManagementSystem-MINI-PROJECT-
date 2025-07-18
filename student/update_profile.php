<?php
session_start();
require_once '../config/db.php';
    
    
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['new_fname'], $_POST['new_email'], $_POST['new_phone'], $_POST['new_address'])){
        $new_email = $_POST['new_email'];
        $new_fname = $_POST['new_fname'];
        $new_phone = $_POST['new_phone'];
        $new_address = $_POST['new_address'];
        //check if email is taken
        $sql = "SELECT * FROM students WHERE email =  '$new_email'";
        $result =  mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) === 1){
            echo "Email is taken";
            exit;
        } else {
            //if not then update  it
            $sql = "UPDATE students SET full_name = '$new_fname',
                email = '$new_email',
                phone = '$new_phone',
                address = '$new_address'
                WHERE email = '{$_SESSION['email']}'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_affected_rows($conn) > 0){
            echo "Updated Successfully";
            $_SESSION['email'] = $new_email;
            $_SESSION['fname'] = $new_fname;
            $_SESSION['phone'] = $new_phone;
            $_SESSION['address'] = $new_address;
            $email = $_SESSION['email'];
            $fname = $_SESSION['fname'];
            $phone = $_SESSION['phone'];
            $address = $_SESSION['address'];
            header("Location: profile.php?updated=true");
            exit;
        } else {
            echo "Update not successful";
        }
        }
    } else {
        echo "ERROR";
    }
?>