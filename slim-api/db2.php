<?php
if (PHP_SAPI != 'cli') {
    exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$table = 'users';

$schema->dropIfExists( $table );

// Cria a tabela users
$schema->create( $table, function ($table){
    
    $table->increments('id');
    $table->string('name', 100);
    $table->string('email' , 180);
    $table->string('password' , 32);
});

// Preenche a tabela
$db->table($table)->insert([
    'email' => 'adm@teste.com.br',
    'password' => '244466666',
    'name' => 'admteste'
    
]);

$db->table($table)->insert([
    'email' => 'adm2@teste.com.br',
    'password' => '244466666',
    'name' => 'admteste'
    
]);