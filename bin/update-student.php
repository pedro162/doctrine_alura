<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$repository = $entityManager->getRepository(Student::class);

$student = $repository->find($argv[1]);
#$student = $entityManager->find(Student::class, $argv[1]);
$student->nome($argv[2]);
$entityManager->flush();
