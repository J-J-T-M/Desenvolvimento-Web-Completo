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

            $routes['inscreverse'] = array(
                'route' => '/inscreverse',
                'controller' => 'indexController',
                'action' => 'inscreverse'
            );
            $routes['register'] = array(
                'route' => '/register',
                'controller' => 'indexController',
                'action' => 'register'
            );
            $routes['authenticate'] = array(
                'route' => '/authenticate',
                'controller' => 'AuthController',
                'action' => 'authenticate'
            );

            $routes['logoff'] = array(
                'route' => '/logoff',
                'controller' => 'indexController',
                'action' => 'index'
            );
            $routes['timeline'] = array(
                'route' => '/timeline',
                'controller' => 'indexController',
                'action' => 'timeline'
            );
    
            $this->setRoutes($routes);
        }

        

        

        
    }


?>