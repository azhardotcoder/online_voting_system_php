<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['confirm_password'];
$address = $_POST['Address'];
$image = $_FILES['image']['name'];
$tmp_name = $FILES['image']['tmp_name'];
$role = $_POST['role'];

if ($password == $cpassword) {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO TABLENAME VALUES (name, mobile, password, address, image, role) VALUES ('$name', '$mobile, '$password', '$address', '$image', '$role')");
    if ($insert) {
        echo '
    <script>
        alert("Registration successful");
        window.location = "../";
    </script>
    ';
    } 
    else{
        echo '
    <script>
        alert("Something went wrong! Please try again.");
        window.location = "../routes/register.html";
    </script>
    ';
    }
} 
    else {
        echo '
        <script>
            alert("Password are not matching");
            window.location = "../routes/register.html";
        </script>
    ';
}
