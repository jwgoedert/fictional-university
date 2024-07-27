<?php 
    function greet($name, $description) {
        echo "<p>Hello, $name. How is your $description day going?</p>";
    }
    
    greet('Tom', 'sunny');
    greet('Mike', 'rainy');
    greet('John', 'cloudy');
    greet('Jane', 'windy');
?>