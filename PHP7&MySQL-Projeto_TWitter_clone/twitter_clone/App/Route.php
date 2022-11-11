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
                'controller' => 'AuthController',
                'action' => 'logoff'
            );
            $routes['timeline'] = array(
                'route' => '/timeline',
                'controller' => 'AppController',
                'action' => 'timeline'
            );
            $routes['tweet'] = array(
                'route' => '/tweet',
                'controller' => 'AppController',
                'action' => 'tweet'
            );$routes['deleteTweet'] = array(
                'route' => '/deleteTweet',
                'controller' => 'AppController',
                'action' => 'deleteTweet'
            );
            $routes['whoToFollow'] = array(
                'route' => '/whoToFollow',
                'controller' => 'AppController',
                'action' => 'whoToFollow'
            );
            $routes['action'] = array(
                'route' => '/action',
                'controller' => 'AppController',
                'action' => 'action'
            );
    
            $this->setRoutes($routes);
        }

        

        

        
    }


?>