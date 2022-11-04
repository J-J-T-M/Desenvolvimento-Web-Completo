<?php
    namespace App\Models;

    use MF\Model\Model;

    class Product extends Model
    {
        public function getProduct()
        {
            $query = "
            select id, descricao, preco
                from tb_produtos
            ";
            return $this->db->query($query)->fetchAll();
        }
    }


?>