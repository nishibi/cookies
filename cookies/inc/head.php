<?php
session_start();
if(empty($_SESSION['login'])){
    $_SESSION['login'] = $_POST['loginname'];
}
$id_session = session_id();
?>
<?php
if (isset($_GET['add_to_cart'])) {
    if (!isset($_SESSION['cart'][$_GET['add_to_cart']])) {
        $_SESSION['cart'][$_GET['add_to_cart']] = 0;
    }
    $_SESSION['cart'][$_GET['add_to_cart']]++;
}
if (isset($_GET['reduce_in_cart'])) {
    if (isset($_SESSION['cart'][$_GET['reduce_in_cart']])) {
        $_SESSION['cart'][$_GET['reduce_in_cart']]--;

        if ($_SESSION['cart'][$_GET['reduce_in_cart']] <= 0) {
            unset($_SESSION['cart'][$_GET['reduce_in_cart']]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Cookie Factory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css"/>
</head>
<body>
<header>
    <!-- MENU ENTETE -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
                    <h1>The Cookies Factory</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!empty($_SESSION['login'])){
                        echo "<li><a href=\"../deconnection.php\">Se déconnecter</a></li>";
                    }else{
                        echo "<li><a href=\"login.php\">Se connecter</a></li>";
                    }?>
                    <li><a href="#">Chocolates chips</a></li>
                    <li><a href="#">Nuts</a></li>
                    <li><a href="#">Gluten full</a></li>
                    <li>
                        <a href="/cart.php" class="btn btn-warning navbar-btn">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                            Cart
                            <span class="badge badge-light"><?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?></span>
                        </a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid text-right">
        <?php
        if(empty($_SESSION['login'])){
            echo "<strong>Hello Wilder !</strong>";
        }else{
            echo "<strong>Hello " . $_SESSION['login'] . " !</strong>";
        } ?>
    </div>
</header>
