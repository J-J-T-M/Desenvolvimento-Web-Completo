<?php
    namespace A;
    interface CadastroInterface 
    {
        public function salvar();
    }
    class Cliente implements CadastroInterface, \B\CadastroInterface
    {
        public function __construct()
        {
            // exibir os metodos do obj
            echo '<pre>';
                print_r(get_class_methods($this));
            echo '</pre>';
        }
        public $nome = "J.J.T.M";
        public function __get($attr)
        {
            return $this->$attr;
        }
        public function salvar()
        {

        }
        public function remover()
        {

        }
    }
 
    namespace B;
    interface CadastroInterface 
    {
        public function remover();
    }
    class Cliente implements CadastroInterface, \A\CadastroInterface
    {
        public function __construct()
        {
            // exibir os metodos do obj
            echo '<pre>';
                print_r(get_class_methods($this));
            echo '</pre>';
        }
        public $nome = "J.J";
        public function __get($attr)
        {
            return $this->$attr;
        }
        public function remover()
        {

        }
        public function salvar()
        {

        }
    }
    $c = new Cliente();
    echo '<pre>';
        print_r($c);
    echo '</pre>';

    echo $c->__get('nome').'<br>';

    //-------------------------------
     
    // utilizando a class do namespace A

    $c = new \A\Cliente();
    echo '<pre>';
        print_r($c);
    echo '</pre>';

    echo $c->__get('nome').'<br>';



?>