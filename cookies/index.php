<?php
if ($_POST['first'] && $_POST['second']) { // если в пост записаны переменные. то есть получается при отправке формы только куки создаются.
    setcookie('first', $_POST['first'], time() + 3600);
    setcookie('second', $_POST['second'], time() + 3600);
   header('Location: index.php'); // конструкция, чтобы при перезагрузке странице не было предупреждения о повторной отправке формы
    // и чтобы куки заполнялись српазу, а не после перезагрузки страницы, так как мы отправляем ее не асинхронно.
    //эта конструкция сама перезагружает форму после ее отправки.
}


//$_POST['first'] значение переменной first в объекте пост
?>

<form  method="post">
    <input type="text" name="first" required>
    <input type="text" name="second" required>
    <button>Отправить</button>

</form>

<?php
var_dump($_POST);
var_dump($_COOKIE);