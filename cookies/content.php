<?php
session_start();
if (!$_SESSION['login'] || !$_SESSION['password']) // если пользователь не авторизован, то будет мгновенно отправлен на странице авторизации.
{
    header("Location: session.php");
    die();//на всякий случай
}



if ($_POST['unlogin']) {
    session_destroy(); //логины и пароли обнулятсяи перейти на страницу контента по прямой ссылке не получится
    header("Location: session.php");
}



?>

<body style="background-color:<?= $_SESSION["color"]?>;">

<h1>Ты авторизовался!</h1>

<form method="post">
<input type="submit" name="unlogin" value="ОБРАТНО НА СТРАНИЦУ АВТОРИЗАЦИИ"> // при нажатии на кнопку в пост запишется значение unlogin
</form>

</body>

<?php

var_dump($_SESSION);
var_dump($_POST);

var_dump($_COOKIES['color']);

