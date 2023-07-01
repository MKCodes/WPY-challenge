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

    // Validate first name
    if (strlen($firstName) > 255) {
        $isValid = false;
        $errors['first-name'] = 'First Name should be a maximum of 255 characters';
    }

    // Validate last name
    if (strlen($lastName) > 255) {
        $isValid = false;
        $errors['last-name'] = 'Last Name should be a maximum of 255 characters';
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'Please enter a valid email address';
    }

    // Validate phone number
    if (!preg_match('/^\d{10}$/', $phoneNumber)) {
        $isValid = false;
        $errors['phone-number'] = 'Please enter a valid phone number';
    }

    if (strlen($password) < 8) {
        $isValid = false;
        $errors['password'] = 'Password should be a maximum of 8 characters or longer';
    }

    // Validate address
    if (strlen($address) > 255) {
        $isValid = false;
        $errors['address'] = 'Address should be a maximum of 255 characters';
    }

    // Validate city
    if (strlen($city) > 255) {
        $isValid = false;
        $errors['city'] = 'City should be a maximum of 255 characters';
    }

    // Validate province
    if (empty($province)) {
        $isValid = false;
        $errors['province'] = 'Please select a province';
    }

    // Validate country
    if (empty($country)) {
        $isValid = false;
        $errors['country'] = 'Please select a country';
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


