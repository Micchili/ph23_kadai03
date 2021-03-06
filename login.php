<?php
    session_start();
    require_once "./database.php";
    $id = htmlspecialchars($_POST["id"]);
    $pass = htmlspecialchars($_POST["pass"]);

    try {
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
        //エラーモード変更
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //エミュ変更
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

        $sql = "SELECT * FROM user WHERE id=? AND password=?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$id);
        $ps->bindValue(2,$pass);

        $ps->execute();
        $recorde = $ps->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($recorde)) {
            $_SESSION["login_user"] = $recorde["id"];
            header("location:./view_products.php");
        }
        else {
            header("location:./index.html");
        }
    } catch ( Exception $e) {
        echo $e->getMessage();
    }

    $pdo = null;
