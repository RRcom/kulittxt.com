<?php

namespace Sample\Model;

class ModelTest {
    
    public function __construct() {
        exit();
    }

    public static function sayHello($return = FALSE) {
        $greetings = "Hello\n";
         if($return) return $greetings;
         echo $greetings;
    }
    
}




