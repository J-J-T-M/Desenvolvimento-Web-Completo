<?php
    namespace App\Controllers;
    
    // recurso do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    // models
    // use 
     
        class IndexController extends Action
    {
        public function index()
        {
            $this->render('index');
           
        }
       
    }


?>