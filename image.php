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

        $sql = "SELECT * FROM user WHERE image=?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$id);

        $result = $ps->execute();
        if (isset($result)) {
            $recorde = $ps->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["login_user"] = $recorde["id"];
            header("location:./view.php");
        }
        else {
            header("location:./user.php");
        }
    } catch ( Exception $e) {
        echo $e->getMessage();
    }

    $pdo = null;
