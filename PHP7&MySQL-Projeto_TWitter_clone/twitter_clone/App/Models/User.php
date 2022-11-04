<?php

    namespace App\Models;

    use MF\Model\Model;

    class User extends Model
    {
        private $id;
        private $name;
        private $email;
        private $password;

        public function __get($attr)
        {
            return $this->$attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }

        // salvar
        public function save()
        {
            $query = "insert into users(name, email, password)values(:name, :email, :password)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue('name', $this->name);
            $stmt->bindValue('email', $this->email);
            $stmt->bindValue('password', $this->password);// md5()-.hash 32 caráteres //para criptografar 
            $stmt->execute();

            return $this;
        }



        // validar se o cadastro pode ser feito
        public function validateRegistration()
        {
            $valid = true;

            (strlen($this->__get('name')) < 3) ? $valid = false : $valid = true;
            
            filter_var($this->email, FILTER_VALIDATE_EMAIL) ? $valid =true  : $valid = false;

            (strlen($this->__get('password')) < 3) ? $valid = false : $valid = true;

            return $valid;

        }
        
        // recuperar usuário por email
        public function userByEmail()
        {
            $query = "select name, email from users where email = :email";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue('email', $this->email);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        // método para autenticar usuário
        public function authenticate()
        {
            $query = "select id, name, email from users where email = :email and password = :password";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue('email', $this->__get('email'));
            $stmt->bindValue('password', $this->__get('password'));
            $stmt->execute(); 

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($user['id'] != '' && $user['name'] != ''){
                $this->__set('id', $user['id']);
                $this->__set('name', $user['name']);
            }

            return $this;
        }


    }

?>