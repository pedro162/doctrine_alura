<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$student = (new Student())->nome($argv[1]);

$phone = new Phone();
$phone->number = $argv[2];

$student->addPhone($phone);
$entityManager->persist($student);
//Allows various save action in a single transaction 
//$entityManager->persist($student);
//$entityManager->persist($student);
$entityManager->flush();
