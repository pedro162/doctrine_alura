<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$repository = $entityManager->getRepository(Student::class);

$students = $repository->findAll();
print($repository->count([]) . " estudantes encontrados." . PHP_EOL . PHP_EOL);
#echo "<pre>";
#print_r($students);
#echo "</pre>";
foreach ($students as $student) {
    echo "ID: " . $student->id . ' - Nome: ' . $student->nome . PHP_EOL . PHP_EOL;
    if (!$student->phones->isEmpty()) {
        echo 'Telefones: ' . PHP_EOL;

        echo implode(separator: ',', array: $student->phones->map(fn(Phone $phone) => $phone->number)
            ->toArray());
        echo PHP_EOL;
    }

    if (!$student->courses->isEmpty()) {
        echo 'Cursos: ' . PHP_EOL;

        echo implode(separator: ',', array: $student->courses->map(fn(Course $course) => $course->name)
            ->toArray());

        echo PHP_EOL;
    }

    echo PHP_EOL;
}

#$student = $entityManager->find(Student::class, $argv[1]);

#$student = $repository->findBy(['id' => $argv[1]]);#Pega todos do filtro e retorna um array
#$student = $repository->findBy([], ['nome' => 'ASC'], 3); //Pega todos e ordena pelo nome
#echo '<pre>';
#print_r($student);
#echo '</pre>';
#$student = $repository->findOneBy(['id' => $argv[1]]); //Pega o primeiro do filtro e retorna um objeto ou null
#
#if ($student === null) {
#    echo "Nenhum estudante encontrado com o ID: " . $argv[1] . PHP_EOL;
#} else {
#    echo "ID: " . $student->id . ' - Nome: ' . $student->nome . PHP_EOL;
#}
