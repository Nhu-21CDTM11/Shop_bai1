<?php
$pdo = get_pdo();

if (!file_exists("get_user")) {
    function get_user()
    {
        global $pdo;

        $sql = "SELECT * FROM USERS";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users ?? false;
    }
}

if (!file_exists("delete_user")) {
    function delete_user($user_id)
    {

        global $pdo;

        $sql = "DELETE FROM USERS WHERE ID=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $user_id);


        $stmt->execute();
    }
}

if (!file_exists("update_user")) {
    function update_user($user_id, $email, $password, $role)
    {
        global $pdo;

        $sql = "UPDATE USERS SET EMAIL=:email, PASSWORD=:password, ROLE=:role WHERE ID=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        $stmt->execute();
    }
}

if (!file_exists("detail_user")) {
    function detail_user($id)
    {
        global $pdo;

        $sql = "SELECT * FROM USERS WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}
