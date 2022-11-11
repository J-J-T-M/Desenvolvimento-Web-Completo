<?php

use MyApp\View;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;


    require 'vendor/autoload.php';

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]); // para mostrar os erros  utilizar só em produção

    // DATABASE
    
    $container = $app->getContainer();
    $container['db'] = function(){
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;

    };
    
    $app->get('/usuarios', function(Request $request, Response $response)  {
        
        $db = $this->get('db');


        // Criar tabela
        // $db->schema()->dropIfExists('usuarios');
        // $db->schema()->create('usuarios', function($table){
        //     $table->increments('id');
        //     $table->string('nome');
        //     $table->string('email');
        //     $table->timestamps(); // criar dois campos para controlar quando foi criado e modificado

        // });

        // // Inserir

        // $db->table('usuarios')->insert([
        //     'nome' => 'teste',
        //     'email' => 'teste@teste.com.br',
        // ]);

        // // Atualizar

        // $db->table('usuarios')
        //             ->where('id', 2)
        //             ->update([
        //                 'nome' => '@teste@',
        //                 'email' => 'testetestando@teste.com.br'
        //             ]);

        // // Delete

        // $db->table('usuarios')
        //             ->where('id', 1)
        //             ->delete();
       
        // // Listar

        // $tabela_usuarios = $db->table('usuarios');
        // $usuarios = $tabela_usuarios->get();
        // foreach ($usuarios as $usuario){
        //     echo $usuario->nome.'<br>';
        // }
    });

    $app->run();

    // // Middleware [[Middleware 1(App)]Middleware 2]

    // $app->add(function ($request, $response, $next){

    //     $response->getBody()->write("Inicio camada 1 + ");
    //     // return $next($request, $response);
    //     $response = $next($request, $response);

    //     $response->getBody()->write(' + Fim camada 1 ');
    //     return $response;

    // });

    // $app->get('/usuarios', function(Request $request, Response $response)  {
        
    //     $response->getBody()->write("Ação principal usuarios");
       
    // });
    
    // $app->get('/postagens', function(Request $request, Response $response)  {
        
    //     $response->getBody()->write("Ação principal postagens");
       
    // });
    // $app->run();
    // tipos de respostas 
    //  cabeçalho, texto, Json, XML

    // $app->get('/header', function(Request $request, Response $response)  {
        
    //     $response->getBody()->write("Esse ie um arquivo header");
    //     return $response->withHeader('allow', 'PUT')
    //                     ->withAddedHeader('Content-Length', 30);

    // });

    // $app->get('/Json', function(Request $request, Response $response)  {
    //     return $response->withJson([
    //         "nome" => "J-J-T-M",
    //         "idade" => "666"
    //     ]);
    // });
    // $app->get('/xml', function(Request $request, Response $response)  {
        
    //     $xml = file_get_contents('arquivo.xml');
    //     $response->write($xml);
    //     return $response->withHeader('Content-Type', 'application/xml');

    // });


    // $app->run();
    // // Container dependency injection

    // class Servico{}

    // // Container Pimple
    // $container = $app->getContainer(); // disponibilizar serviços a partir do app
    // $container['servico'] = function() {
    //     return new Servico;
    // };

    // $app->get('/servico', function(Request $request, Response $response)  {
        
    //     $servico = $this->get('servico');
    //     var_dump($servico);
    // });

    // // Controlllers como serviços
    // $container = $app->getContainer(); // disponibilizar serviços a partir do app
    // $container['Home'] = function() {
    //     return new MyApp\Controllers\Home(new MyApp\View);
    // };

    // $app->get('/usuario', 'Home:index');

    // $app->run();

    // // Padrão PSR7
    // $app->get('/postagens', function(Request $request, Response $response){
        
    //     // Escrevendo no corpo da resposta utilizando o padrão PRS7
    //     $response->getBody()->write("Lista de postagens");
        
    //     return $response;
    // });

    // $app->post('/usuarios/adiciona', function(Request $request, Response $response){
        
    //     // Recuperar post ($_POSt)
    //     $post = $request->getParsedBody();
    //     $nome = $post['nome'];
    //     $email = $post['email'];

    //     // Inserindo no BD com o Insert

    //     return $response->getBody()->write( "Sucesso");
        
    // });
    // $app->put('/usuarios/atualiza', function(Request $request, Response $response){
        
    //     // Recuperar post ($_POSt)
    //     $post = $request->getParsedBody();
    //     $id = $post['id'];
    //     $nome = $post['nome'];
    //     $email = $post['email'];

    //     // Atualizando no BD com o Update

    //     return $response->getBody()->write( "Sucesso ao Atualizar: ".$id);
        
    // });
    // $app->delete('/usuarios/remove/{id}', function(Request $request, Response $response){
    //     $id = $request->getAttribute('id');

    //     // Apagar no BD com o Delete

    //     return $response->getBody()->write( "Sucesso ao Deletar: ".$id);
        
    // });
    
    // $app->run();
        // Tipos de requisições ou Verbos HTTP

        // get -> Recuperar recursos do servidor (Select)
        // post -> Criar dado no servidor (Insert)
        // put -> Atualizar dados no servidor (Update)
        // delete -> Deletar dados do servidor (Delete)


    /*---ROTAS---*/
    // $app->get('/postagem0', function(){

    //     echo 'Lista de postagem';

    // });
    // $app->get('/usuarios/[{id}]', function($request, $response){
    //     $id = $request->getAttribute('id');
    //     echo "Usuario com id: ".$id;

    // });
    // $app->get('/postagem[/{ano}[/{mes}]]', function($request, $response){
    //     $ano = $request->getAttribute('ano');
    //     $mes = $request->getAttribute('mes');
        
    //     echo "Lista de postagens Ano: ".$ano." mes: ".$mes;

    // });

    // $app->get('/lista/{itens:.*}', function($request, $response){
    //     $itens = $request->getAttribute('itens');
        
    //     var_dump(explode("/", $itens));

    // });
    // // nomear rotas
    // $app->get('/blog/postagens/{id}', function($request, $response){
    //    echo "Listar postagem para um ID";
    // })->setName("blog"); // nomeando a rota

    // $app->get('/meusite', function($request, $response){
    //    $return = $this->get("router")->pathFor("blog" , ["id" => "5"]);  //recupera uma rota para um determinado caminho
    //    echo $return;
    // });

    // //Agrupar rotas
    // $app->group('/v1', function(){

    //     $this->get('/usuarios', function(){

    //         echo 'Lista de usuarios';
    //     });
    //     $this->get('/postagens', function(){

    //         echo 'Lista de postagens';
    //     });
    // });

    // $app->run();