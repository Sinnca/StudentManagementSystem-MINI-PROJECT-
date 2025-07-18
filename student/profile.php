<?php
session_start();
require_once '../config/db.php';
if(!isset($_SESSION['email'])){
        header("Location: /StudentSystem/student/login.html");
        exit;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_GET['updated']) && $_GET['updated'] === 'true'): ?>
    <p style="color: green;">Updated Successfully!</p>
    <?php endif; ?>
    
    <h1>Profile</h1>
    <h2>Hi <?php echo $_SESSION['fname'];?></h2>
    <div>
    <form action="update_profile.php" method="post">
        <p>Edit Info</p>
        <label for="Fname">Full Name: </label>
        <input type="text" name="new_fname" value="<?php echo htmlspecialchars($_SESSION['fname']); ?>">
        <br>
        <label for="Email">Email: </label>
        <input type="text" name="new_email" value="<?php  echo htmlspecialchars($_SESSION['email']); ?>">
        <br>
        <label for="Number">Number: </label>
        <input type="text" name="new_phone" value="<?php  echo htmlspecialchars($_SESSION['phone']); ?>">
        <br>
        <label for="Address">Address: </label>
        <input type="text" name="new_address" value="<?php  echo htmlspecialchars($_SESSION['address']); ?>">
        <br>
        <input type="submit" value="update">
    </form>
</div>
<div>
    <?php
    $Email = $_SESSION['email'];
    $Id = $_SESSION['id'];
    $Fname = $_SESSION['fname'];
    $Specialty = $_SESSION['specialty'];
    $Phone = $_SESSION['phone'];
    $Gender = $_SESSION['gender'];
    $Address = $_SESSION['address'];

    echo "<strong>Email:</strong> " . htmlspecialchars($Email) . "<br>";
    echo "<strong>Full Name:</strong> " . htmlspecialchars($Fname) . "<br>";
    echo "<strong>Specialty:</strong> " . htmlspecialchars($Specialty) . "<br>";
    echo "<strong>Phone:</strong> " . htmlspecialchars($Phone) . "<br>";
    echo "<strong>Gender:</strong> " . htmlspecialchars($Gender) . "<br>";
    echo "<strong>Address:</strong> " . htmlspecialchars($Address) . "<br>";
    ?>
</div>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>

