<?php 
    class Pai {
        private $nome = '';
        protected $sobrenome = '';
        public $humor;
        
        public function __set($attribute, $value)
        {
            $this->$attribute = $value;
        }
        public function __get($attribute)
        {
            return $this->$attribute;
        }
        private function executarMania() 
        {
			echo 'Assobiar';
		}

		protected function responder() 
        {
			echo 'Oi';
		}

		public function executarAcao() 
        {
			$x = rand(1, 10);

			if($x >= 1 && $x % 2 ==0) 
            {
				$this->responder();	
			} else 
            {
				$this->executarMania();	
			}			
		}
    }
    // quando uma classe herda a outra ele só recebe os metodos e atribudos que são protected e public.
    class Filho extends Pai
    {
        public function __construct()
        {
            // exibir os metodos do obj
            echo '<pre>';
                print_r(get_class_methods($this));
            echo '</pre>';
        }

        private $nome;
        private $idade;
        private function executarMania()
        {
            echo "<br> Executando mania";
        } 
        protected function responder() 
        {
			echo 'Ola';
		} 
        public function acao() 
        {
			$x = rand(1, 10);

			if($x >= 1 && $x % 2 ==0) {
                $this-> responder();
			} else {
				$this->executarMania();	
			}
        }
    }
    // se eu  uso os metodos magicos __get __set eu não preciso chamar as funções para adicionar e recuperar valor 
    // $p1 = new Pai();
    // $p1 -> nome = "Manoel";
    
    // $p1 -> sobrenome = "Carvalinho";
    
    // $p1 -> humor = 'Feliz';
    // echo $p1 -> nome .' '. $p1 -> sobrenome .' humor: '.$p1 -> humor.'<br>';
    // echo $p1 -> executarAcao();
    
    $f = new Filho();
    echo '<pre>';
        print_r($f);
    echo '</pre>';
    echo $f -> acao();
    
    
    
?>


