<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

//Createasimple "default"DoctrineORMconfigurationfor Attributes
$config =ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/src"),
    isDevMode: true,
);

//or ifyou preferXML
//$config=ORMSetup::createXMLMetadataConfiguration(
// paths:array(__DIR__."/config/xml"),
// isDevMode:true,
// );

// Configurons the database connection
$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

