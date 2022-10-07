<?php
// static não pode utilizar o $this
    class Exemplo {
        public static $atributo1 = 'Eu sou um atributo estático <br>';
        public $atributo2 = 'Eu sou um atributo normal <br>';

        public static function metodo1()
        {
            echo "Eu sou um método estático <br>";
        }
        public function metodo2()
        {
            echo "Eu sou um método normal <br>";
        }
    }

    // echo Exemplo::$atributo1;
    // Exemplo::metodo1();

    // não consigo acessar os dois pois eles não são estáticos 

    // echo Exemplo::$atributo2;
    // echo Exemplo::metodo2();

    $e = new Exemplo();

    // não dar para acessar usando o operador -> para acessar metodos e atributo estaticos
    echo $e -> atributo1; 

?>