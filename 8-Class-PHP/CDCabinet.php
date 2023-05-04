<?php require_once('Product.php');

class CDCabinet extends Product{
    private $capacity;
    private $model;
    public function __construct($name,$price,$discount,$capacity,$model){
        $this->name = $name;
        $this->price = $price + ($price * (15/100));
        $this->discount = $discount;
        $this->capacity = $capacity;
        $this->model = $model;
    }
    public function getCapacity(){
        return $this->capacity;
    }
    public function setCapacity($capacity){
        $this->capacity = $capacity;
    }
    public function getModel(){
        return $this->model;
    }
    public function setModel($model){
        $this->model = $model;
    }

}