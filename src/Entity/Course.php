<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'Course')]
class Course
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[Column]
    public readonly string $name;

    /**
     * List of students enrolled in the course.
     *
     * @var Collection
     */
    #[ManyToMany(targetEntity: Student::class, mappedBy: "courses", cascade: ['persist', 'remove'])]
    protected Collection $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            return $this;
        }

        $this->students->add($student);
        $student->enrollInCourse($this);
        return $this;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new \InvalidArgumentException("Property {$name} does not exist in " . __CLASS__);
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return;
        }

        throw new \InvalidArgumentException("Property {$name} does not exist in " . __CLASS__);
    }
}
