<?php
//CRUD
    class TasksService
    {
        private $connection;
        private $task;

        public function __construct(Connection $connection, Tasks $task)
        {
            $this->connection = $connection->connect();
            $this->task = $task;
        }

        public function insertTask() //create
        {
            $insert = 'insert into tb_tarefas(tarefa)values(:task)';
            $stmt = $this->connection->prepare($insert);
            $stmt->bindValue(':task', $this->task->__get('task'));
            $stmt->execute();
        }

        public function recoverTask() //read
        {
           $recover = '
           Select 
            t.id, s.status, t.tarefa 
           from 
            tb_tarefas as t
            left join tb_status as s on (t.id_status = s.id)
            ';
           $stmt = $this->connection->prepare($recover);
           $stmt->execute();
           return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function updateTask() //update
        {
           $update = "update tb_tarefas set tarefa = ? where id = ?";
           $stmt = $this->connection->prepare($update);
           $stmt->bindValue(1, $this->task->__get('task'));
           $stmt->bindValue(2, $this->task->__get('id'));
           return $stmt->execute();
        }

        public function removeTask() //delete
        {
            $delete = "delete from tb_tarefas where id = ?";
            $stmt = $this->connection->prepare($delete);
            $stmt->bindValue(1, $this->task->__get('id'));
            $stmt->execute();
        }
        public function taskAccomplished() //atualizar o id status
        {
           $update = "update tb_tarefas set id_status = ? where id = ?";
           $stmt = $this->connection->prepare($update);
           $stmt->bindValue(1, $this->task->__get('id_status'));
           $stmt->bindValue(2, $this->task->__get('id'));
           return $stmt->execute();
        }


    }




?>