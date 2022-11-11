<?php
    namespace App\Controllers;
    
    // recurso do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;
     
        class AuthController extends Action
    {
        public function authenticate()
        {
            $user = Container::getModel("User");
            $user->__set('email',$_POST['email']);
            $user->__set('password',md5($_POST['password']));
           
            $return = $user->authenticate();
           
            if(!empty($user->__get('id')) && !empty($user->__get('name')))
           
            {
              session_start();
              $_SESSION['id'] = $user->__get('id');
              $_SESSION['name'] = $user->__get('name'); 

              header("location: timeline");
            }
            else
            {
                header("location: /?login=erro");  
            }

        }

        public function logoff ()
        {
            session_start();
            session_destroy();
            header("location: /");
        }


    }

?>