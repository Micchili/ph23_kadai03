<?php
    require_once "./database.php";
    try {
        $pdo = new PDO(PRODUCTS_DSN,DB_USER,DB_PASSWORD);
        //エラーモード変更
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //エミュ変更
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

        $sql = "SELECT * FROM product";
        $row = $pdo->query($sql);
        $recorde = $row->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["cart"] = $recorde;
    } catch ( Exception $e) {
        echo $e->getMessage();
    }

    $pdo = null;
