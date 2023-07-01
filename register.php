<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phone-number']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $city = trim($_POST['city']);
    $province = $_POST['province'];
    $country = $_POST['country'];

    $isValid = true;
    $errors = [];

    //more rule specific (company laws)
    if (strlen($password) < 8) {
        $isValid = false;
        $errors['password'] = 'Password should be a maximum of 8 characters or longer';
    }

    if (!$isValid) {
        session_start();
        //if i decide to show it in the future, i can access the session variable
        $_SESSION['errors'] = $errors;
        header('Location: index.html');
        exit;
    }

    // If the form data is valid and submitted successfully
    $successMessage = "Thank you, " . $firstName . " " . $lastName . " for signing up. Registration Successful!";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
    <div class="register">
    <?php echo $successMessage ?>
    </div>
</body>
</html>


