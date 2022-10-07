<?php
    class Pessoa{
        public $nome = null;

        function __construct($nome)
        {
            echo "Objeto iniciado";
            $this->nome = $nome;
        }
        //  depois que finaliza as requisições pelo lado do server o metodo destruct é chamado porem somente se ele foi declarado
        function __destruct(){
            echo '<br>Objeto removido';
        }
        function __get($attribute)
        {
            return $this->$attribute;
        }

        function correr()
        {
            echo '<br>'.$this->__get('nome').' está correndo';
        }

    }
    $p1 = new Pessoa('J.J.T.M');
    echo '<br> Nome: '.$p1->__get('nome').'<hr>';
    $p1->correr();
    // unset($p1);



?>