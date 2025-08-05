<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id, GeneratedValue, Column]
    protected int $id;

    #[Column]
    protected string $nome;

    /**
     * One Student has many Phones.
     *
     * @var Collection<int, Phone>
     */
    #[OneToMany(targetEntity: Phone::class, mappedBy: 'student', cascade: ['persist', 'remove'])]
    protected Collection $phones;

    /**
     * Many Students have many Courses.
     *
     * @var Collection<int, Course>
     */
    #[ManyToMany(targetEntity: Course::class, inversedBy: 'students', cascade: ['persist', 'remove'])]
    protected Collection $courses;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function nome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function id(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new \InvalidArgumentException("Property {$name} does not exist in " . __CLASS__);
    }

    public function addPhone(Phone $phone): self
    {
        $this->phones->add($phone);
        $phone->student = $this;
        return $this;
    }

    public function enrollInCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            return $this;
        }

        $this->courses->add($course);
        $course->addStudent($this);
        return $this;
    }
}
