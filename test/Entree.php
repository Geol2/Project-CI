<?php

class Entree {
    public $name;
    public $ingredients = array();
    
    public function __construct($name, $ingredients) {
        if(!is_array($ingredients)) {
            throw new Exception('$ingredients 가 배열이 아납니다.');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIntegredient($ingredients) {
        return in_array($ingredients, $this->ingredients);
    }

    public static function getSize() {
        return array('소', '중', '대');
    }
}