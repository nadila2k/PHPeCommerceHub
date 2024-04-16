
<?php include 'inc/header.php' ?>

<?php
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";


    if ($res = mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $res = mysqli_query($conn, $sql);
        if ($rows = mysqli_fetch_assoc($res)) {
            $_SESSION['email'] = $email;
            $_SESSION['coustomerid'] = $rows['id'];
            header('Location: checkout.php?id=' . $rows['id']);
        } else {
            header('location:login.php');
        }
    }
} else {
    # code...
}

?>