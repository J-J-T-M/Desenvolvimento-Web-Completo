<?php
    namespace App\Controllers;
    
    // recurso do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;
     
    class AppController extends Action 
    {
        public function timeline()
        {
            $this->validateAuthentication();
            //    recuperação dos tweets
            $tweet = Container::getModel('Tweet');

            $tweet->__set('id_user', $_SESSION['id']);

            $total_record_per_page = 10;
            
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $displacement = ($page - 1) * $total_record_per_page;

            $tweets = $tweet->getPerPage($total_record_per_page, $displacement);
            $total_tweets = $tweet->getTotalRecords();
            $this->view->total_page = ceil($total_tweets['total'] / $total_record_per_page);
            $this->view->pageOn = $page;

            $this->view->tweets = $tweets;

            $user = Container::getModel('User');
            $user->__set('id', $_SESSION['id']);
            
            $this->view->totalTweets = $user->totalTweets();
            $this->view->totalFollowing = $user->totalFollowing();
            $this->view->totalFollowers = $user->totalFollowers();

            
            $this->render('timeline');
        }
        public function tweet ()
        {
            $this->validateAuthentication();
            $tweet = Container::getModel('Tweet');

            $tweet->__set("tweet", $_POST["tweet"]);
            $tweet->__set("id_user",$_SESSION['id']);

            $tweet->save();
            header("Location: /timeline");
            
         }  
         public function deleteTweet()
         {
            $this->validateAuthentication();
            echo "<pre>"; print_r($_GET);echo "</pre><hr>";
            $id_tweet = isset($_GET['id_tweet']) ? $_GET['id_tweet'] : '';
            $tweet = Container::getModel('Tweet');
            $tweet->__set("id", $id_tweet);
            $tweet->deleteTweet();
            header("Location: /timeline");
         }
         
         public function validateAuthentication()
         {
            session_start();
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['name']) || $_SESSION['name'] == '')
            {
                header("Location: /?login=erro"); 
            }
         }
         public function whoToFollow()// quem seguir 
         {
            $this->validateAuthentication();

            $searchFor = isset($_GET['searchFor']) ? $_GET['searchFor'] : '';
            $users= array();
            if($searchFor != '')
            {
                $user = Container::getModel('User');
                $user->__set('name', $searchFor);
                $user->__set('id', $_SESSION['id']);
                $users = $user->getAll();
               
            }
            $this->view->users = $users;

            
            $user = Container::getModel('User');
            $user->__set('id', $_SESSION['id']);
            
            $this->view->totalTweets = $user->totalTweets();
            $this->view->totalFollowing = $user->totalFollowing();
            $this->view->totalFollowers = $user->totalFollowers();


            $this->render("whoToFollow");
         }

         public function action()
         {
            $this->validateAuthentication();

            // ação
            $action = isset($_GET['action']) ? $_GET['action'] : '';
            $id_user_follower = isset($_GET['id_user']) ? $_GET['id_user'] : '';

            $user = Container::getModel('User');

            $user->__set('id', $_SESSION['id']);

            if($action == 'seguir')
            {
                $user->followUser($id_user_follower);
                
            }
            else if($action == 'deixar_de_seguir')
            {
                $user->unfollowUser($id_user_follower);
                
            }
            header('Location: /whoToFollow');
         }


    }


?>   