<?php
    namespace App;

    use MF\Init\Bootstrap;

    class Route  extends Bootstrap
    {

        protected function initRoutes()
        {
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            );
            $routes['about_us'] = array(
                'route' => '/aboutUs',
                'controller' => 'indexController',
                'action' => 'aboutUs'
            );

            $this->setRoutes($routes);
        }

        

        
    }


?>