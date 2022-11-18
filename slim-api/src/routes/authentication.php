<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Product;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use function DI\get;

// Routes para geração de token
$app->post('/api/token', function($request, $response){
    
    $dados = $request->getParsedBody();

    $email = $dados['email'] ?? null;
    $password = $dados['password'] ?? null;

    $user = User::where('email', $email)->first();

    if (!is_null($user) && $password === $user->password) 
    {
        //gerar token
		$secretKey   = $this->get('settings')['secretKey'];
		$accessKey = JWT::encode($user, $secretKey);

		return $response->withJson([
			'key' => $accessKey
		]);

    }
    return $response->withJson([
        'status' => 'error'
    ]);

});