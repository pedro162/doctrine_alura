<?php

namespace Alura\Doctrine\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'message')]
class Message
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    public readonly int $id;
    #[Column(type: Types::STRING, length: 140, nullable: true)]
    public readonly string $text;
    #[Column(name: 'posted_at', type: Types::DATETIME_MUTABLE)]
    public readonly string $postedAt;
}
//https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/basic-mapping.html
#Identifiers / Primary Keys 