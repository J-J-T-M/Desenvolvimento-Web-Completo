<?php
    namespace App\Models;

    use MF\Model\Model;

    class Tweet extends Model
    {
        private $id;
        private $id_user;
        private $tweet;
        private $data;

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
            $query = "insert into tweets(id_user, tweet)values(:id_user, :tweet)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id_user'));
            $stmt->bindValue(':tweet', $this->__get('tweet'));
            $stmt->execute();

            return $this;
        }


        // recuperar por paginação

        public function getPerPage($limit, $offset)
        {
            $query ="Select
                        t.id, t.id_user, u.name, t.tweet, DATE_FORMAT(t.data, '%d-%m-%Y %H:%i') as data
                    From 
                        tweets as t
                      left join users as u on (t.id_user = u.id)
                    where 
                        t.id_user = :id_user
                    or t.id_user in (select id_user_follower from followingusers where id_user = :id_user)
                    order by
                        t.data desc
                    limit 
                        $limit
                    offset 
                        $offset    
                    ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id_user'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        public function getTotalRecords() // recuperar total de tweet 
        {
            $query ="Select
                       count(*) as total
                    From 
                        tweets as t
                      left join users as u on (t.id_user = u.id)
                    where 
                        t.id_user = :id_user
                    or t.id_user in (select id_user_follower from followingusers where id_user = :id_user) 
                    ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $this->__get('id_user'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function deleteTweet()
        {
            $query = "delete from tweets where id = :id ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->execute();

            return true;
        }


    }
?>