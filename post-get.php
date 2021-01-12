<?php
//echo "<pre>";
//var_dump($_GET);
//echo "</pre>";

//if (isset($_GET["text"])) {// если у нас существует гет с ключом текст
//    echo "Hello, " . $_GET["text"]; // поприветствовать
//    //die(); // остановить выполнение кода
//}

echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

?>

<form action="" method="post">
    <input type="text" name="username">
    <input type="submit">
</form>
