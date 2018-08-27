<?php

/*1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?*/

abstract class Product
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    protected function __construct($id, $name, $description, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    abstract protected function getPrice();

    abstract protected function getRevenue();


}

trait Revenue
{
    public function getRevenue()
    {
        return ($this->getPrice()) * 0.05;
    }
}

class ProductDigital extends Product
{
    use Revenue;

    public function getPrice()
    {
        return ($this->price) / 2;
    }

    function __construct($id, $name, $description, $price)
    {
        parent:: __construct($id, $name, $description, $price);
    }
}

class ProductPiece extends Product
{
    use Revenue;

    public function getPrice()
    {
        return $this->price;
    }

    function __construct($id, $name, $description, $price)
    {
        parent:: __construct($id, $name, $description, $price);
    }
}

class ProductByWeight extends Product
{
    use Revenue;

    private $weight;

    function __construct($id, $name, $description, $price, $weight)
    {
        parent:: __construct($id, $name, $description, $price);
        $this->weight = $weight;
    }

    public function getPrice()
    {
        return ($this->price) * ($this->weight);
    }
}

$item1 = new ProductDigital(1, 'Товар 1', 'Описание', 100);
echo $item1->getPrice() . '<br>';

$item2 = new ProductPiece(2, 'Товар 2', 'Описание', 100);
echo $item2->getPrice() . '<br>';

$item3 = new ProductByWeight(3, 'Товар 3', 'Описание', 100, 5);
echo $item3->getPrice() . '<br>';

$revenue1 = $item1->getRevenue();
$revenue2 = $item2->getRevenue();
$revenue3 = $item3->getRevenue();

echo "Доход 1: $revenue1 <br> Доход 2: $revenue2<br> Доход 3: $revenue3";

/*    2. *Реализовать паттерн Singleton при помощи traits.*/

trait MyTrait
{
    public function myFunc()
    {
        return 2 + 2;
    }
}

class Singleton
{
    private static $instance; // Экземпляр объекта

// Защищаем от создания через new Singleton
    private function __construct()
    { /* ... @return Singleton */
    }

// Защищаем от создания через клонирование
    private function __clone()
    { /* ... @return Singleton */
    }

// Защищаем от создания через unserialize
    private function __wakeup()
    { /* ... @return Singleton */
    }

// Возвращает единственный экземпляр класса. @return Singleton
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function doAction()
    {
    }
}

/* Применение*/
Singleton::getInstance()->doAction();