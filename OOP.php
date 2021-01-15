<?php

//нужные свойства записываются в класс
//public - модификатор доступа.
class Article
{
    public $title = 'Новая статья';
    public $titleFontSize = 20;
    public $articleBody = 'lorem lorem lorem';
    public $articleBodyFontSize = 14;
    public $border = '1px solid black';
    public $background;

    //функции внутри класса называются методами

    //метод конструктор. Параметрами указываем свойства, которые надо в обязательном порядке задать при каждом создании нового объекта.
    // когда используем конструктор дефолтные значения также следует использовать в параметрах конструктора и из переменных сверху можно убрать значения, оставив только ключи.
    // чтобы указать стандартные значения параметров в конструкторе, нужно указать их в параметрах и поместить в конец параметров
    //при отрисовке, параметры со стандартными значениями не надо указывать. тест2
    public function __construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, $border = '2px solid black', $background = 'red')
    {
        //указываем, что стандартные значения должны переопределяться значениями из параметров
        $this->title = $title;
        $this->titleFontSize = $titleFontSize;
        $this->articleBody = $articleBody;
        $this->articleBodyFontSize = $articleBodyFontSize;
        $this->border = $border;
        $this->background = $background;
    }

    //с помощью $this мы обращаемся не к свойству класса в целом, а к свойству объекта, с которым мы работаем
    public function printArticle () {
        echo "<div style='border: {$this->border}; background: {$this->background}; font-size: {$this->articleBodyFontSize}px;'>
        <h2 style='font-size: {$this->titleFontSize}px'>{$this->title}</h2>
        <p>{$this->articleBody}</p>
        </div>";
    }
}
//чтобы создать объект класса, надо создать переменную и присвоить через ключевое
// слово new класс c ().
//$sportNews = new Article();

//вызов метода

//$sportNews->printArticle();



//создадим еще 2 объекта
//$sportNews2 = new Article();
//$sportNews2->printArticle();
//
//$sportNews3 = new Article();
//$sportNews3->printArticle();

//Мы можем менять свойства класса для конкретного объекта
//$sportNews2->title = 'Спортивные новости';
//$sportNews3->title = 'Новости футбола';
//
//$sportNews->background = 'red';
//$sportNews2->background = 'yellow';
//$sportNews3->background = 'blue';

// теперь метод будут отрисовывать с изменениями указанными
//$sportNews->printArticle();
//$sportNews2->printArticle();
//$sportNews3->printArticle();

//Мы создали 3 статьи по одной инструкции.

//Встроенные метод конструктор. Позволяет не менять каждое свойство класса, расписывая изменения на многие строки.

$test = new Article('Спортивные новости', 20, 'lorem lorem lorem', 14, '2px solid red', 'yellow');
$test->printArticle();

$test2 = new Article('Спортивные новости', 20, 'lorem lorem lorem', 14);
$test2->printArticle();


class SportArticle extends Article
{
    //прописываем, какими новыми уникальными свойствами и методами обладает новый класс
    //так как новый класс унаследовал все свойства родительского, нам также нужно создавать объект, указывая параметры родителя.
    public $image;
    public function __construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, string $image, $border = '2px solid black', $background = 'red')
    {
        $this->image=$image;
        parent::__construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, $border, $background);
    }

    public function printArticle () {
        echo "<div style='border: {$this->border}; background: {$this->background}; font-size: {$this->articleBodyFontSize}px;'>
        <h2 style='font-size: {$this->titleFontSize}px'>{$this->title}</h2>
        <p>{$this->articleBody}</p>
        <img src='{$this->image}'>
        </div>";
    }
}

class WeatherArticle extends Article
{
    public $temperature;

    public function __construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, string $temperature, $border = '2px solid black', $background = 'red')
    {
        $this->temperature=$temperature;
        parent::__construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, $border, $background);
    }

    public function printArticle () {
        echo "<div style='border: {$this->border}; background: {$this->background}; font-size: {$this->articleBodyFontSize}px;'>
        <h2 style='font-size: {$this->titleFontSize}px'>{$this->title}</h2>
        <p>{$this->articleBody}</p>
        <p>Температура сегодня: {$this->temperature}</p>
        </div>";
    }

}

class PoliticsArticle extends Article
{
    public $link;
    public function __construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, string $link, $border = '2px solid black', $background = 'red')
    {
        $this->link=$link;
        parent::__construct($title, $titleFontSize, $articleBody, $articleBodyFontSize, $border, $background);
    }

    public function printArticle () {
        echo "<div style='border: {$this->border}; background: {$this->background}; font-size: {$this->articleBodyFontSize}px;'>
        <h2 style='font-size: {$this->titleFontSize}px'>{$this->title}</h2>
        <p>{$this->articleBody}</p>
        <p>Более подробная информация по  <a href='{$this->link}'>ссылке</a>. </p>
        </div>";
    }
}

$sportNews = new SportArticle('Спортивная статья', 20, 'sport sport sport', 14, 'image.jpg');
$sportNews->title = 'Test';
$sportNews->printArticle();

$weatherNews = new WeatherArticle('Прогноз погоды', 20, 'weatherNews', 14, -20);
$weatherNews->printArticle();

$politicsNews = new PoliticsArticle('Новости политики', 20, 'politicsNews', 14, 'http://google.com');
$politicsNews->printArticle();





//HOMEWORK OOP

abstract class Products
{
    public $name = 'Новый продукт';
    public $price = 1000;
    public $weight = 2;

    public function __construct($name, $price, $weight, $border = '1px solid red', $background = '#1a454f')
    {

        if (is_string($name)) {
            $this->name = $name;

        } else {
            $this->name = 'Неверный тип данных для названия';
        }

        if (is_integer($price)) {
            $this->price = $price;

        } else {
            $this->price = 'Неверный тип данных для цены';

        }

        if (is_integer($weight)) {

            $this->weight = $weight;
        } else {

            $this->weight = 'Неверный тип данных для веса';
        }

        $this->border = $border;
        $this->background = $background;
    }

    public function printArticle() {
        echo "<div style='border: {$this->border}; background: {$this->background};'> 
        <h1>{$this->name}</h1>
        <p>{$this->price} рублей</p>
        <p>{$this->weight} кг</p>
      
 
 </div>";
    }
}

class ProductsWithPrice extends Products {
//    public $priceWithout = $price + 10;
    public $nds = 13;
    public function printArticle() {
        parent::printArticle();
        echo "<p> Цена без НДС: {$this->price} + {$this->nds} </p>";

//        echo "<p> Цена без НДС: {$this->priceWithout}</p>";
    }
}




$productItems = [
[
    'name' => 'капуста',
    'price' => 16,
    'priceWithoutVAT' => 13,
    'weight' => 2,
],
   ['name' => 'морковь',
    'price' => 15,
    'weight' => 6,
],
[    'name' => 'яблоки',
    'price' => 55,
    'weight' => 3,
],
];


//foreach ($productItems as $item) {
//
//    $product1 = new Products($item['name'], $item['price'], $item['weight']);
//    $product1->printArticle();
//}

foreach ($productItems as $item) {

    $product1 = new ProductsWithPrice($item['name'], $item['price'], $item['weight']);
    $product1->printArticle();
}


// HOMEWORK OOP part 2


class Chocolate extends Products
{
    public $image;
    public $calories;
    public function __construct($name, $price, $weight, $calories, $image, $border = '1px solid red', $background = '#1a454f')
    {
        $this->calories = $calories;
        $this->image = $image;
        parent::__construct($name, $price, $weight, $border, $background);
    }

    public function printArticle()
    {
        echo "<div style='border: {$this->border}; background: {$this->background};'> 
        <h1>{$this->name}</h1>
        <p>{$this->price} рублей</p>
        <p>{$this->weight} кг</p>
        <p>{$this->calories} каллоррий</p>
        ";
    }

    public function showImage() {
        echo "<div style='background-image: url({$this->image}); background-size: cover; width: 200px; height: 200px;'></div>
 </div>";
    }
}



class Candy extends Products {
    public $image;
    public function __construct($name, $price, $weight, $image, $border = '1px solid red', $background = '#1a454f')
    {
        $this->image = $image;
        parent::__construct($name, $price, $weight, $border, $background);
    }

    public function printArticle() {
        echo "<div style='border: {$this->border}; background: {$this->background};'> 
        <h1>{$this->name}</h1>
        <p>{$this->price} рублей</p>
        <p>{$this->weight} кг</p>
        ";
    }

    public function showImage() {
        echo "<div style='background-image: url({$this->image}); background-size: cover; width: 100px; height: 100px;'></div>
 </div>";
    }
}

$chocolate1 = new Chocolate('шоколад', 100, 200, 350, 'chocolate.png');
$chocolate1->printArticle();
$chocolate1->showImage();

$candy1 = new Candy('конфета', 45, 123,  'chocolate.png');
$candy1->printArticle();
$candy1->showImage();



//HOMEWORK OOP THINKING




//OOP part 3 LESSON

class User
{
    const MARK = 123;

    public static $login = 'test';

    public static function getLogin()
        {
            echo self::$login;
        }

    public function getMark () {
        echo User::MARK . "<br>";
        echo self::MARK;
    }
}
$abc = new User();
echo $abc->MARK; // не получится
//echo User::MARK; // можно обратиться так
$abc->getMark();

$abc->getLogin();
User::getLogin();


//магические методы
class User2
{
    private $test = 123;
  public function __get($name)
  {
      echo "Нельзя обратиться к свойству с именем $name";
  }

  public function __set($name, $value)
  {
      echo "Вы не можете присвоить значение $value несуществующему свойству $name";
  }

  public function __call($name, $arguments)
  {
      echo "Метода с именем $name не существует";
  }

  public function __toString()
  {
      return "Это объект класса User и свойством test со значением {$this->test}";
  }

}
$abcd = new User2();
echo $abcd->test; // при обращении к приватному свойству сработает функция геттер
echo $abcd;

//ИНТЕРФЕЙСЫ

interface iPrint
{
    public function printSmth();
}

interface iTest
{
    public function getTest();
}

class User implements iPrint, iTest
{
    public function printSmth()
    {
        echo 1234567;
    }
    public function getTest() {

    }
}