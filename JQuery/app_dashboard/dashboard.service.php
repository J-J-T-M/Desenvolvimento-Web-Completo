<?php
//CRUD
    class DashboardService 
    {
        private $connection;
        private $dashboard;
        
        public function __construct(Connection $connection, Dashboard $dashboard)
        {
            $this->connection = $connection->connect();
            $this->dashboard = $dashboard;
        }
        public function getactiveClients()
        {
            $query = '
                select 
                    count(*) activeClients 
                from
                    tb_clientes
                where
                    cliente_ativo = 1
                ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->activeClients;
        }
        public function getinactivesClients()
        {
            $query = '
                select 
                    count(*) inactivesClients 
                from
                    tb_clientes
                where
                    cliente_ativo = 0
                ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->inactivesClients;
        }
        public function getSalesNumbers()
        {
            $query = '
            select 
				count(*) as salesNumbers 
			from 
				tb_vendas 
			where 
				data_venda between :date_start and :date_end
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':date_start',$this->dashboard->__get('date_start'));
            $stmt->bindValue(':date_end',$this->dashboard->__get('date_end'));
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->salesNumbers;
        }

        public function getSalesAmount()
        {
            $query = '
            select 
				SUM(total) as salesAmount 
			from 
				tb_vendas 
			where 
				data_venda between :date_start and :date_end
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':date_start',$this->dashboard->__get('date_start'));
            $stmt->bindValue(':date_end',$this->dashboard->__get('date_end'));
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->salesAmount;
        }
        public function gettotalComplaints()
        {
            $query = '
                select 
                    count(*) totalComplaints 
                from
                    tb_contatos
                where
                    tipo_contato = 1
                ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->totalComplaints;
        }
        public function gettotalOfPraise()
        {
            $query = '
            select 
                count(*) totalOfPraise 
            from
                tb_contatos
            where
                tipo_contato = 3
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->totalOfPraise;
        }
        public function gettotalOfSuggestions()
        {
            $query = '
            select 
                count(*) totalOfSuggestions
            from
                tb_contatos
            where
                tipo_contato = 2
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->totalOfSuggestions;
        }

        public function gettotalExpenses()
        {
            $query = '
            select 
				SUM(total) as totalExpenses 
			from 
				tb_despesas 
			where 
				data_despesa between :date_start and :date_end
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':date_start',$this->dashboard->__get('date_start'));
            $stmt->bindValue(':date_end',$this->dashboard->__get('date_end'));
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->totalExpenses;
        }

    }


?>