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
            //  var_dump($user);
            //  die;
            if($user && $user['id'] != '' && $user['name'] != ''){
                $this->__set('id', $user['id']);
                $this->__set('name', $user['name']);
            }

            return $this;
        }

        public function getAll()
        {
            $query = "
            select 
                u.id, u.name, u.email, (
                    select 
                        count(*)
                    from 
                        followingusers as fu
                    where
                        fu.id_user = :id_user and fu.id_user_follower = u.id

                )as follower_yn
            from 
                users as u
            where 
                u.name like :name  and u.id != :id_user";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':name', '%'.$this->__get('name').'%');
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function followUser($id_user_follower)
        {
            $query = "insert into followingusers(id_user, id_user_follower)values(:id_user, :id_user_follower)";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user_follower', $id_user_follower);
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return true;
        }
        public function unfollowUser($id_user_follower)
        {
            $query = "delete from followingusers where id_user = :id_user and id_user_follower = :id_user_follower";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user_follower', $id_user_follower);
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return true;
        }
        public function totalTweets()
        {
            $query = " select count(*) as totalTweets from tweets where id_user = :id_user ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);;

        }
        public function totalFollowing() // seguindo
        {
            $query = " select count(*) as totalFollowing from followingusers where id_user = :id_user ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);;

        }
        public function totalFollowers() // seguidores
        {
            $query = " select count(*) as totalFollowers from followingusers where id_user_follower = :id_user ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);;

        }

    }

?>