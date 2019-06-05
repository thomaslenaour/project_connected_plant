<?php

// Registration
if (isset($_POST['form-registration']) && isset($_POST['first-name-r']) && isset($_POST['last-name-r']) && isset($_POST['email-r']) && isset($_POST['password-r']) && isset($_POST['password-confirm-r'])) {
    if (!empty($_POST['first-name-r']) && !empty($_POST['last-name-r']) && !empty($_POST['email-r']) && !empty($_POST['password-r']) && !empty($_POST['password-confirm-r'])) {
        $firstName = $_POST['first-name-r'];
        $lastName = $_POST['last-name-r'];
        $emailR = $_POST['email-r'];
        $passwordR = $_POST['password-r'];
        $passwordConfirmR = $_POST['password-confirm-r'];

        if ($passwordR === $passwordConfirmR) {
            $createUser = Users::addUser($firstName, $lastName, $emailR, $passwordR);

            if ($createUser) {
                $successMessage = '<p class="success-message p-0 m-0">Félicitations ! Vous pouvez désormais vous connecter.</p>';
            }
            else {
                $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> L\'adresse email est déjà utilisée.</p>';
            }
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Les mots de passes ne correspondent pas.</p>';
        }
    }
    else {
        $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Merci de remplir tous les champs.</p>';
    }
}

// Connection
if (isset($_POST['form-connection']) && isset($_POST['email-c']) && isset($_POST['password-c'])) {
    if (!empty($_POST['email-c']) && !empty($_POST['password-c'])) {
        $emailC = $_POST['email-c'];
        $passwordC = $_POST['password-c'];

        $dataUser = Users::getUserByEmail($emailC);

        if ($dataUser) {
            if (password_verify($passwordC, $dataUser['password'])) {
                $_SESSION['isUserConnected'] = true;
                $_SESSION['userFirstName'] = $dataUser['first_name'];
                $_SESSION['userLastName'] = $dataUser['last_name'];
                $_SESSION['userEmail'] = $dataUser['email'];
                $_SESSION['userID'] = intval($dataUser['id']);
                $_SESSION['userRank'] = intval($dataUser['rank']);
                header('Location: ./me');
            }
            else {
                $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Mot de passe invalide. Merci de réessayer.</p>';
            }
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> L\'adresse email n\'existe pas. Merci de vous inscrire.</p>';
        }
    }
    else {
        $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Merci de remplir tous les champs.</p>';
    }
}