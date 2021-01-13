<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
date_default_timezone_set('America/Lima');
require_once __DIR__ . '/vendor/autoload.php';
$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/app/Config/Yaml"), $isDevMode);
$conn = array(
    'host' => 'ec2-34-254-24-116.eu-west-1.compute.amazonaws.com',
    'driver' => 'pdo_pgsql',
    'user' => 'qrohnorvqdmark',
    'password' => 'e3e4078733b005776694f1c4fcf404573802a28ce23de9789fd0dc6d8375be63',
    'dbname' => 'd690spa697ttah',
    'port' => '5432'
);
$entityManager = EntityManager::create($conn, $config);