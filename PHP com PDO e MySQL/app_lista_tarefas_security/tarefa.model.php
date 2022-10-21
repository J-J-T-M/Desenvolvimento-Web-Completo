<?php

    class Tasks
    {
        private $id ;
        private $id_status;
        private $task;
        private $date_register;

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