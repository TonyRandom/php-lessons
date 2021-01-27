<?php
$connection = new PDO('mysql:host=localhost;dbname=practice_db; charset = utf8',
    'root', 'root');
$aboutData = $connection->query("SELECT * FROM about");

//foreach ($aboutData as $data) {
//    echo $data['name'];
//} //так можно посмотреть содержимое БД из пхп

$aboutData= $aboutData->fetch(); //чтобы видеть результат в разметке превращаем БД в массив.

$educationData = $connection->query("SELECT * FROM education");
$languagesData = $connection->query("SELECT * FROM languages");
$interestsData = $connection->query("SELECT * FROM interests");
$aboutCareer = $connection->query("SELECT * FROM aboutCareer");
$aboutCareer = $aboutCareer->fetch();
$career = $connection->query("SELECT * FROM career");
$projects = $connection->query("SELECT * FROM projects");
$skills = $connection->query("SELECT * FROM skills");