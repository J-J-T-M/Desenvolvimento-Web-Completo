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
            $user->__set('password',$_POST['password']);
           
            $return = $user->authenticate();
           
            if(!empty($user->__get('id')) && !empty($user->__get('name')))
// 
// 
// 
// 
// 
// 
//                  ERRO AQUI 
// 
//                  Warning: Trying to access array offset on value of type bool in 
// 
// 
//                  COMO RESOLVER NO PHP 8 
// 
// 
//             
            {
              echo "autenticado <pre>";
              print_r($user);
          echo "</pre"; 
            }
            else
            {
                echo "não autenticado <pre>";
                    print_r($user);
                echo "</pre";  
            }

        }


    }

?>