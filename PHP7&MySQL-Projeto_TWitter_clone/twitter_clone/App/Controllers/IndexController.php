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
            $this->view->login = isset($_GET['login']) ? $_GET['login'] :'';
            $this->render('index');
           
        }

        public function inscreverse()
        {
            $this->view->user = array(
				'name' => '',
				'email' => '',
				'password' => '',
			);
            $this->view->erroCadastro = false;

            $this->render('inscreverse');

           
        }
        public function register()
        {
            // receber dados do formulário
            
            $user = Container::getModel("User");

            $user->__set('name',$_POST['name']);
            $user->__set('email',$_POST['email']);
            $user->__set('password',md5($_POST['password']));// md5 para criptografar 
            
            // sucesso
            if($user->validateRegistration() && count($user->userByEmail()) == 0)
            {
                 //count para contar a quantidades de registro com o mesmo email se for igual a 0 significa que não tem nenhum email então pode salvar
                 
                 {
                    $user->save();  

                    $this->render('register');
                }
            }
            // erro
            else{

                $this->view->user = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                );

                $this->view->erroCadastro = true;

                $this->render('inscreverse');



            }
            
            
        }
       
    }


?>