<?php

/**
 * Class Users
 * Permit to do requests about users in DataBase
 */
class Users {

    /**
     * Permit to get all Users from DataBase
     * @return array
     */
    static function getUsers() {
        global $db;

        $req = $db->fetch('SELECT * FROM users', [], false);

        return $req;
    }
    
    /**
     * Permit to add user in DB
     *
     * @param [string] $email
     * @param [string] $password
     * @return boolean
     */
    static function addUser($firstName, $lastName, $email, $password) {
        global $db;

        $firstName = str_secur($firstName);
        $lastName = str_secur($lastName);
        $email = str_secur($email);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $checkEmail = $db->fetch('SELECT email FROM users WHERE email = ?', [$email], false);

        if (!$checkEmail) {
            $req = $db->execute('INSERT INTO users(first_name, last_name, email, password, date_registration, rank) VALUES(?, ?, ?, ?, NOW(), 1)', [$firstName, $lastName, $email, $password]);

            return $req;
        }
        else {
            return false;
        }
    }

    /**
     * Get user by email
     *
     * @param [string] $email
     * @return array
     */
    static function getUserByEmail($email) {
        global $db;

        $email = str_secur($email);

        $req = $db->fetch('SELECT * FROM users WHERE email = ?', [$email], false);

        return $req;
    }

}