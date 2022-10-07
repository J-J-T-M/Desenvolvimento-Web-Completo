<?php
    interface EquipamentoEletronico
    {
       public function ligar();
       public function desligar(); 
    }
    class Geladerira implements EquipamentoEletronico
    {
        public function abrirPorta()
        {
            echo "Abrindo porta<br>";
        }
        public function ligar(){
            echo "Ligando<br>";
        } 
        public function desligar(){
            echo "Desligando<br>";
        }
    }
    class Tv implements EquipamentoEletronico
    
    {
        public function trocarCanal()
        {
            echo "Trocando o canal<br>";
        }
        public function ligar(){
            echo "Ligando<br>";
        } 
        public function desligar(){
            echo "Desligando<br>";
        }
    }

    $t = new Tv();
    $g = new Geladerira();

//--------------------------------------------------------------------------

    interface MamiferoInterface
    {
        public function respirar();
    }
    interface TerrestreInterface 
    {
        public function andar();
    }
    interface AquaticoInterface
    {
        public function nadar();
    }

    class Humano implements MamiferoInterface, TerrestreInterface
    {
        public function respirar()
        {
            echo "Respirar <br>";
        }
        public function andar()
        {
            echo "Andar <br>";
        }
        public function conversar()
        {
            echo "Conversar<br>";
        }
    }
    
    class Baleia implements MamiferoInterface, AquaticoInterface
    {
        public function respirar()
        {
            echo "Respirar <br>";
        }
        public function nadar()
        {
            echo "Nadar <br>";
        }
        protected function esguichar()
        {
            echo "Esguichar <br>";
        }
    }
//----------------------------------------------------------------

    interface AnimalInterface
    {
        public function comer();
    }
    interface AveInterface extends AnimalInterface
    {
        public function voar();
    }

    class Papagaio implements AveInterface
    {
        public function voar()
        {
            echo "Papagaio voando<br>";
        }
        public function comer()
        {
            echo "Papagaio comendo<br>";
        }
    }

?>