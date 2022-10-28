<?php
    // classe dashboard
    class Dashboard
    {
        public $date_start; // data inicial
        public $date_end; // data final
        public $salesNumbers; // numeros de vendas
        public $salesAmount; // total de vendas 
        public $activeClients; // clientes ativos
        public $inactivesClients; // clientes inativos
        public $totalComplaints ; //1 total de reclamações
        public $totalOfPraise ; //3 total de elogios
        public $totalOfSuggestions; //2 total de sugestões
        public $totalExpenses ; // total de despesas
        
        public function __get($name)
        {
            return $this->$name;
        }
        public function __set($name, $value)
        {
            $this->$name = $value;
            return $this;

        }

    }



?>