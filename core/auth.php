<?php

$pdo = get_pdo();



if (!function_exists("login")) {
    function login($email, $password)
    {
        global $pdo;
        $sql = "SELECT email, role FROM USERS WHERE email = :email AND password = :password";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user ?? false;
    }
}

if (!function_exists("register")) {
    function register($email, $password, $role = 'user')
    {
        if (email_exisit($email))
            return false;

        global $pdo;

        $sql = "INSERT INTO USERS(ID, EMAIL, PASSWORD, ROLE) VALUES(NULL, :email, :password , :role)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        $stmt->execute();

        return login($email, $password);
    }
}

if (!function_exists("email_exisit")) {

    function email_exisit($email)
    {
        global $pdo;

        $sql = "SELECT * FROM USERS WHERE EMAIL=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);


        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Lấy danh sách kết quả
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            return true;
        }

        return false;
    }
}
if (!function_exists("logout")) {
    function logout()
    {
        unset($_SESSION['user']);
        setcookie("user", "", time() - 360);
    }
}
