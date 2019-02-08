<?php 
  session_start();
  require_once "cart.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h1>商品一覧</h1>
    <form action="logout.php" method="post">
    <?php foreach ($_SESSION["cart"] as $row) { ?>
    商品コード：<?php print $row["code"]; ?><br>
    商品名：<?php print $row["name"]; ?><br>
    価格：¥<?php print $row["price"]; ?><br>
    <img src="../<?php print $row["image_name"]; ?>"><br>
      <input type="hidden" name="price" value="<?php print $row["price"]; ?>">
      <input type="hidden" name="image_name" value="<?php print $row["name"]; ?>">
      <input type="hidden" name="image_path" value="<?php print $row["image_name"]; ?>">
      <input type="submit" value="カートへ送る">
      <?php } ?>
    </form>
    <form action="" method="post"></form>
      <input type="submit" name="<?php $_SESSION['login_user']?>" value="ログアウト">
    </form>
</body>
</html>