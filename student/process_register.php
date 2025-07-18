<?php
require_once '../config/db.php';
?>

<?php
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Fname'], $_POST['Email'], $_POST['Password'], $_POST['Number']
    ,$_POST['Address'])) {
        
        $Fname = $_POST['Fname'];
        $Specialty = $_POST['Specialization'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $hash = password_hash($Password, PASSWORD_DEFAULT);
        $Number = $_POST['Number'];;
        $Address = $_POST['Address'];
        $Gender = $_POST['Gender'];

        $sql = "SELECT * FROM students WHERE email = '$Email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($conn) === 1){
            echo "Your Input Email have account. Please try another Email";
        } else {
        $sql = "INSERT INTO students (full_name, email, password, phone, specialization, gender, address) 
        VALUES ('$Fname', '$Email' , '$hash', '$Number', '$Specialty', '$Gender', '$Address')";
        $data = mysqli_query($conn, $sql);
        header("Location: /StudentSystem/student/login.html");
        }
    } else {
        echo "Error 404";
    }
?>