<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Product;

// Routes for products

//  ORM -> Object Relational Mapper (Mapeador de objeto relacional)
//  Illuminete -> é o motor da base de dados do Laravel sem o Laravel
//  Eloquent ORM

$app->group('/api/v1', function(){

    // Listar produtos
    $this->get('/products/list', function($request, $response){

        $products = Product::get();
        return $response->withJson($products);
    });

    // adicionar produtos
    $this->post('/products/add', function($request, $response){

        $dados = $request->getParsedBody();
        $product = Product::create($dados);
        return $response->withJson($product);
    });

    // Recupera produto para um determinado ID
    $this->get('/products/list/{id}', function($request, $response, $args){

        $product = Product::findOrFail($args['id']);
        return $response->withJson($product);
    });

    // Atualiza produto para um determinado ID
    $this->put('/products/update/{id}', function($request, $response, $args){

        $dados = $request->getParsedBody();
        $product = Product::findOrFail($args['id']);
        $product->update($dados);
        return $response->withJson($product);
    });

    // Remove para um determinado ID
    $this->get('/products/remove/{id}', function($request, $response, $args){

        $product = Product::findOrFail($args['id']);
        $product->delete();
        return $response->withJson($product);
    });

});

