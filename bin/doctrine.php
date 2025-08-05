#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Alura\Doctrine\Helper\EntityManagerCreator;

$entityManager = EntityManagerCreator::createEntityManager();

$cli = new Application('Doctrine Command Line Interface', '3.x');

$entityManagerProvider = new SingleManagerProvider($entityManager);

ConsoleRunner::addCommands($cli, $entityManagerProvider);

$cli->run();

//php ./bin/doctrine.php
//php ./bin/doctrine.php list
//Comandos
/**
 *  php ./bin/doctrine.php orm:info
   php ./bin/doctrine.php orm:mapping:describe Student
  php ./bin/doctrine.php dbal:run-sql "SELECT * FROM Student"
php ./bin/doctrine.php dbal:run-sql "SELECT 1 as numero"

 */
