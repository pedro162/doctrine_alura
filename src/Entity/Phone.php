<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'Phone')]
class Phone
{
    #[Id, GeneratedValue, Column]
    protected int $id;

    #[Column]
    protected string $number;

    /**
     * Many phones has one Student.
     *
     * @var Student|null
     */
    #[ManyToOne(targetEntity: Student::class, inversedBy: 'phones')]
    private Student $student;

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new \InvalidArgumentException("Property {$name} does not exist in " . __CLASS__);
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new \InvalidArgumentException("Property {$name} does not exist in " . __CLASS__);
    }
}
