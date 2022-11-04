<?php
    namespace App\Controllers;
    
    // recurso do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    // models
    use App\Models\Product;
    use App\Models\Info;


    class IndexController extends Action
    {
        public function index()
        {
            $product = Container::getModel('Product');

            $products = $product->getProduct();

            $this->view->dados = $products;

            $this->render('index', 'layout2');
           
        }

        public function aboutUs()
        {
            $info = Container::getModel('Info');

            $information = $info->getInfo();

            $this->view->dados = $information;

            $this->render('aboutUs', 'layout2');
        }
       
    }


?>