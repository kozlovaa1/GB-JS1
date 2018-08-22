<?php
/*1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.*/
/*2. Описать свойства класса из п.1 (состояние).*/
/*3. Описать поведение класса из п.1 (методы).*/

/*4. Придумать наследников класса из п.1. Чем они будут отличаться?*/

class Product
{
    public $id;


    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


    public function showName()
    {
        echo '<h1>' . $this->name . '</h1>';
    }
}

class ProductProperties extends Product
{
    public $price;
    public $description;

    function __construct($id, $name, $price, $description)
    {
        parent:: __construct($id, $name);
        $this->price = $price;
        $this->description = $description;
    }


    public function showProperties()
    {
        echo '<p>' . $this->price . ' руб.</p><p>Наименование: ' . $this->name . '</p><p>' . $this->description . '</p>';
    }
}


class ProductImage extends Product
{
    public $src;

    function __construct($id, $name, $src)
    {
        parent:: __construct($id, $name);
        $this->src = $src;
    }

    public function showImage()
    {
        echo '<img src="' . $this->src . '" title="' . $this->name . '"><img>';
    }
}

$item = new Product('1', 'Товар 1');
$item->showName();

$itemProps = new ProductProperties('1', 'Товар 1', 100500, 'Товар высокого качества по низкой цене');
$itemProps->showProperties();

$itemImage = new ProductImage('1', 'Товар 1', 'item1.jpg');
$itemImage->showImage();
/*5. Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
Что он выведет на каждом шаге? Почему?*/

/*->1234
Переменная $x задана статической, значит она не привязана к конкретному экземпляру класса и сохраняет изменения своего значения при каждом использовании класса
*/

/*    Немного изменим п.5:
*class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
/6. Объясните результаты в этом случае.*/

/*->1122
Переменная $x принадлежит классу. При наследовании классом B её принадлежность меняется. Следовательно, при вызове класов A и B происходит независимое использование переменной.
*/

/*7. *Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
Что он выведет на каждом шаге? Почему?*/

/*Выведет 1122 по аналогии с предыдущим пунктом. Разница только в том, что в предыдущем примере созадние экземпляра класса было со скобками. Но, так как не используются параметры, скобки здесь не играют роли.*/