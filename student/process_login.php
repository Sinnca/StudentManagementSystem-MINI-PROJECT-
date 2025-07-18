<?php
session_start();
require_once '../config/db.php';
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Email'], $_POST['Password'])){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $sql = "SELECT * FROM students WHERE email = '$Email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_affected_rows($conn) === 1 ){
            $user_data = mysqli_fetch_assoc($result);
        
        if (password_verify($Password, $user_data['password'])){
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['fname'] = $user_data['full_name'];
            $_SESSION['specialty'] = $user_data['specialization'];
            $_SESSION['phone'] = $user_data['phone'];
            $_SESSION['gender'] = $user_data['gender'];
            $_SESSION['address'] = $user_data['address'];
            header("Location: /LoginSystem/Consultant/c_index.php");
            exit;
        } else {
            echo "Incorrect Password";
        }
    } else {
        echo "No Email found";
    }
    } else {
        echo "Error";
    }
?>