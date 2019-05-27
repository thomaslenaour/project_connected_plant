<?php

class Users {
    
    public function addUser($email, $password) {
        global $db;

        $email = str_secur($email);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $req = $db->execute('INSERT INTO users(email, password, date_registration) VALUES(?, ?, NOW())', [$email, $password]);

        return $req;
    }

}