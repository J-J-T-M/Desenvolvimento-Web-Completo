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
$table = 'products';

$schema->dropIfExists( $table );

// Cria a tabela produtos
$schema->create( $table, function ($table){
    
    $table->increments('id');
    $table->string('title');
    $table->text('description', 100);
    $table->decimal('price', 11,2);
    $table->string('maker' , 60);
    $table->timestamps();
});

// Preenche a tabela
$db->table($table)->insert([
    'title' => 'Smartphone Motorola Moto G6 32GB Dual Chip',
    'description' => 'Android Oreo - 8.0 Tela 5.7" Octa-Core 1.8 GHz 4G Câmera 12 + 5MP (Dual Traseira) - Índigo',
    'price' => 899.00,
    'maker' => 'Motorola',
    'created_at' => '2022-11-16',
    'updated_at' => '2022-11-16'
]);

$db->table($table)->insert([
    'title' => 'iPhone X Cinza Espacial 64GB',
    'description' => 'Tela 5.8" IOS 12 4G Wi-Fi Câmera 12MP - Apple',
    'price' => 4999.00,
    'maker' => 'Apple',
    'created_at' => '2022-11-16',
    'updated_at' => '2022-11-16'
]);