<?php
    session_start();
    require_once "./database.php";
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    try {
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
        //エラーモード変更
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //エミュ変更
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $sql = "SELECT * FROM users WHERE id=? OR password=?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$id);
        $ps->bindValue(2,$pass);

        $ps->execute();
        if () {
            # code...
        } $recorde = $ps->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["login_user"] = $recorde["id"];

    } catch ( Exception $e) {
        echo $e->getMessage();
    }
    $pdo = null;
