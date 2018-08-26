<?php
/*1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?*/
abstract class Product
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

class ProductDigital extends Product
{
    public $price;
    public $description;

    function __construct($id, $name, $price, $description)
    {
        parent:: __construct($id, $name);
        $this->price = $price;
        $this->description = $description;
    }


    public function getValue()
    {
        echo '<p>' . $this->price . ' руб.</p><p>Наименование: ' . $this->name . '</p><p>' . $this->description . '</p>';
    }
}


/*    2. *Реализовать паттерн Singleton при помощи traits.*/