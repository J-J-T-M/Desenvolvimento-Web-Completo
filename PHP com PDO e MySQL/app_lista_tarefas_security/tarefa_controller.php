<?php
    require "tarefa.model.php";
    require "tarefa.service.php";
    require "connection.php";

    //fazendo uma pequena cambiara para saber se ação vem do metodo get ou de uma variavel
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;

    if ($acao == 'inserir')
    {
        //instancia do obj tarefa
        $task = new Tasks();
        $task->__set('task', $_POST['task']);

        //instancia de conexão
        $connection = new Connection();

        // instancia do obj tarefaService
        $taskService = new TasksService($connection, $task);
        $taskService->insertTask(); //inserindo tarefa no bd

        header('location: nova_tarefa.php?inclusao=concluida');
    } 
    else if ($acao == 'recuperar')
    {
        //instancia do obj tarefa
        $task = new Tasks();

        //instancia de conexão
        $connection = new Connection();

        // instancia do obj tarefaService
        $taskService = new TasksService($connection, $task);
        $tasks = $taskService->recoverTask(); //recuperando a tarefa do bd
    }
    else if ($acao == 'atualizar')
    {
       //instancia do obj tarefa
       $task = new Tasks();
       $task->__set('id', $_POST['id'])->__set('task', $_POST['task']);

       //instancia de conexão
       $connection = new Connection();

       // instancia do obj tarefaService
       $taskService = new TasksService($connection, $task);
       if($taskService->updateTask() && $acao == 'recuperar')
       {
            header('location: todas_tarefas.php');
       }
       else 
       {
        header('location: index.php');
       }

    }
    else if ($acao == 'remover')
    {
        //instancia do obj tarefa
       $task = new Tasks();
       $task->__set('id', $_GET['id']);

       //instancia de conexão
       $connection = new Connection();

       // instancia do obj tarefaService
       $taskService = new TasksService($connection, $task);
       $taskService->removeTask();

       header('location: todas_tarefas.php');
    }

    else if ($acao == 'marcarRealizada')
    {
        //instancia do obj tarefa
       $task = new Tasks();
       $task->__set('id', $_GET['id'])->__set('id_status',2);

       //instancia de conexão
       $connection = new Connection();

       // instancia do obj tarefaService
       $taskService = new TasksService($connection, $task);
       $taskService->taskAccomplished();

       header('location: todas_tarefas.php');
    }
    else if ($acao == 'recuperarTarefasPedentes')
    {
        //instancia do obj tarefa
        $task = new Tasks();

        //instancia de conexão
        $connection = new Connection();

        // instancia do obj tarefaService
        $taskService = new TasksService($connection, $task);
        $tasks = $taskService->recoverTask(); //recuperando a tarefa do bd
    }


?>