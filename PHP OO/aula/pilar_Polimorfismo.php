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
    function trocarMarcha()
    {
        echo "<br>Desengatar embreagem com o pé e engatar marcha com a mão";
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
    function trocarMarcha()
    {
        echo "<br>Desengatar embreagem com a mão e engatar marcha com o pé";
    }

}
$c1 = new Carro('cdf0e20','red',false);
$m1 = new Moto('bdn0e38','red', -180);

$c1 -> trocarMarcha(); 
$m1 -> trocarMarcha(); 

?>