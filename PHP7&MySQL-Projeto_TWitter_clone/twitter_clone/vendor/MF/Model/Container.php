<?php
    namespace MF\Model;
    use App\Connection;

    class Container
    {
        public static function getModel($model)
        {
            $class = "\\App\\Models\\".ucfirst($model);
            // retornar o modelo solicitado já instanciado, inclusive com a conexão estabelecida
            // instancia de conexão
            $connection = Connection::getDb();

            return new $class($connection);

        }
    }



?>