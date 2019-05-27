<?php
echo '<div style="margin-top: 200px"></div>';
debug($_POST);

if (isset($_POST['form-registration']) && isset($_POST['email-r']) && isset($_POST['password-r']) && isset($_POST['password-confirm-r'])) {
    $emailR = $_POST['email-r'];
    $passwordR = $_POST['password-r'];
    $passwordConfirmR = $_POST['password-confirm-r'];

    if ($passwordR === $passwordConfirmR) {
        $createUser = Users::addUser($emailR, $passwordR);
    }

    if ($createUser) {
        $successMessage = '<p>Success</p>';
    }
    else {
        $errorMessage = '<p>No</p>';
    }
}