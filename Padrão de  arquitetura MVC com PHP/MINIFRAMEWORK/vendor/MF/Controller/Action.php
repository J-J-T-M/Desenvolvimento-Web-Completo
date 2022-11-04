<?php
    namespace MF\Controller;

    abstract class Action
    {
        protected $view;

        public function __construct()
        {
            $this->view = new \stdClass();
        }

        protected function render($view, $layout)
        {
            $this->view->page = $view;
            file_exists("../App/Views/".$layout.".phtml")?require_once "../App/Views/".$layout.".phtml":$this->content();// para verificar se o layout passado existre
        }
        protected function content()
        {
            $classCurrent = get_class($this); //  para saber em qua controller que estamos
            $classCurrent = str_replace('App\\Controllers\\', '', $classCurrent); // para deixar só o nome do controller
            $classCurrent = strtolower(str_replace('Controller', '', $classCurrent)); //para deixar tudo em minusculo
            
            require_once"../App/Views/".$classCurrent."/".$this->view->page.".phtml";
        }
    }

?>