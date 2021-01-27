<?php

session_start(); // инициализация сессии. должна быть в самом начале.
ini_set('session.gc_maxlifetime', 3600); //так можно установить время, через которое сессия закончится



// подключаемся к базе данных с логинами
$connection = new PDO('mysql:host=localhost; dbname=lesson; charset=utf8', 'root', 'root');
$login = $connection->query('SELECT * FROM `users_logins`');



//Проверка, отправилась наша форма или нет
//Если форма отправлена, то проверяем есть ли человек в БД.
//Если есть, то регистрируем в сессию.
if ($_POST['login'])
{
foreach ($login as $log)
{
    if($_POST['login'] == $log['user'] && $_POST['password'] == $log['password']) {

        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['color'] = $_POST['color'];
        $value = $_POST['color'];
        //echo 'Привет, ' . $_POST['login'];
        header('Location: content.php'); // команда переадресации.

    }
}
echo 'Неверный логин или пароль!'; //выведется, если нет ни одного совпадения при переборе массива
}


if ($_SESSION['login'] && $_SESSION['password']) { // запрет перехода на страницу логина авторизованному пользователю

    header('Location: content.php');
    echo 'Пользователь авторизован';


}






?>

    <form  method="post">
        <p>Авторизируйтесь</p>
        <input type="text" name="login" required placeholder="Логин">
        <input type="password" name="password" required placeholder="Пароль">

        <p>Пожалуйста, выберите тему сайта</p>
        <select name="color" required>
            <option value="red">Красный</option>
            <option value="blue">Синий</option>
            <option value="yellow">Желтый</option>
        </select>
        <br>

        <input type="submit">

    </form>

<?php

var_dump($_SESSION);
//echo $_POST["color"];
var_dump($_POST);