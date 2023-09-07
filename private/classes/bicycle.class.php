<?php

class Bicycle {

    //Constants definition
    public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
    public const GENDERS = ['Men', 'Women', 'Unisex'];
    protected const CONDITION_OPTIONS = [1 => 'Beat up', 2 => 'Decent', 3 => 'Good', 4 => 'Great', 5 => 'Like new'];

    //Properties definition
    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public static $description = "Used Bicycle";
    public $gender;
    public $price;
    protected $weight_kg = 0.00;
    protected $condition_id;

    //Methods definition
    public function __construct($args=[])
    {
        $this->brand = $args['brand'] ?? '';
        $this->model = $args['model'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->category = $args['category'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->gender = $args['gender'] ?? '';
        $this->weight_kg = $args['weight_kg'] ?? 0.0;
        $this->price = $args['price'] ?? 0;
        $this->condition_id = $args['condition_id'] ?? 3;
    }

    //todo Caution!!! Following Code Allows Private/Public Props To Be Set So has some cons for security
    //foreach ($args as $k => $v) {
       // if(property_exists($this,$k)){
       //     $this->$k = $v;
       // }
    //} 
    //todo Also Used By Many Coders.

    public function name(){
        return $this->brand . ' ' . $this->model . ' ' . $this->year . '<br/>';
    }

    public function set_weight_kg($value){
        $this->weight_kg = $value;
    }

    public function set_weight_lbs($value){
        $this->weight_kg = floatval($value/2.20462);
    }

    public function get_weight_kg(){
        return floatval($this->weight_kg) . ' Kg';
    }

    public function get_weight_lbs(){
        return floatval($this->weight_kg*2.20462) . ' Lbs';
    }

    public function set_condition($digit){
        $this->condition_id = $digit;
    }

    public function condition(){
            if ($this->condition_id > 0) {
                return self::CONDITION_OPTIONS[$this->condition_id];
            } else {
                return "Unknown";
            }
        }
}

?>