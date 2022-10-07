<?php
class Produto {
    public $categoria ;
    public $titulo ;
    public $descricao ;
    protected $valor ;
 

    function exibirResumoProduto(){
        foreach ($this as $key => $value) {
            print "$key => $value<br>";
        }
        echo "<br><hr>";
    }
    function AlterarValorProduto($Newvalor){
        $this -> valor = $Newvalor;

    }
    // getters stters (overloading / sobrecargar)
    function __set($atributo, $valor){
        $this-> $atributo = $valor;
    }
    function __get($atributo){
        return $this-> $atributo;
    }
    // public function getCategoria()
    // {
    //     return $this->categoria;
    // }
    // public function setCategoria($categoria)
    // {
    //     $this->categoria = $categoria;

    //     return $this;
    // }
    // public function getDescricao()
    // {
    //     return $this->descricao;
    // }
    // public function setDescricao($descricao)
    // {
    //     $this->descricao = $descricao;

    //     return $this;
    // } 
    // public function getValor()
    // {
    //     return $this->valor;
    // }
    // public function setValor($valor)
    // {
    //     $this->valor = $valor;

    //     return $this;
    // }
    // public function getTitulo()
    // {
    //     return $this->titulo;
    // }
    // public function setTitulo($titulo)
    // {
    //     $this->titulo = $titulo;

    //     return $this;
    // }
}
$prot1 = new Produto();
$prot1 ->__set('categoria','carro') ;
$prot1 ->__set('titulo','Opala')  ;
$prot1 ->__set('descricao','O Monstro ainda vive');
$prot1 ->__set('valor',100000);
$prot1 -> exibirResumoProduto(); 
$prot1 -> AlterarValorProduto(120000);
$prot1 -> exibirResumoProduto(); 


?>