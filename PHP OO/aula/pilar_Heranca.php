<?php 
class Veiculo 
{
    
    public $placa = null;
    public $cor = null;

    function acelerar()
    {
        echo "<br>Acelerando!!!";
    }
    function freiar()
    {
        echo "<br>Freiando!!!";
    }
}
class Carro extends Veiculo
{
    public $tetoSolar = false;

    function __construct($placa, $cor, $tetoSolar)
    {
        $this->placa = $placa;
        $this->cor = $cor;
        $this->tetoSolar = $tetoSolar;
    }

    function abrirTetoSolar()
    { 
        if($this->tetoSolar == true)
        {
            echo "<br>Abrindo o teto solar ° ";
        }
        else 
        {
            echo "<br>Carro não possue teto solar ° ";
        }
        
    }
    function alterarPosicaoVolante()
    {
        echo "<br>Alterando a Posição do Volante";
    }
}
class Moto extends Veiculo
{
    public $contaPesoGuidao;
    
    function __construct($placa, $cor, $contaPesoGuidao)
    {
        $this->placa = $placa;
        $this->cor = $cor;
        $this->contaPesoGuidao = $contaPesoGuidao;
    }
    
    function empinar()
    {
        echo "<br>Empinado e caindo ops quebrou a cabeça";
    }
}
$c1 = new Carro('cdf0e20','red',false);
$c1 -> acelerar();
$c1 -> alterarPosicaoVolante();

echo '<pre>'; 
    print_r($c1); 
echo '</pre>';

$m1 = new Moto('bdn0e38','red', -180);
$m1 -> acelerar();
$m1 -> empinar();

echo '<pre>'; 
    print_r($m1); 
echo '</pre>';


?>