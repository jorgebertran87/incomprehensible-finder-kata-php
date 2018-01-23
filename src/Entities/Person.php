<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Entities;
use CodelyTV\FinderKata\Contracts\Date;

final class Person
{

    private $name;
    private $birthDate;

    public function __construct(string $name, Date $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;

    }

    public function name()
    {
        return $this->name();
    }

    public function birthDate()
    {
        return $this->birthDate;
    }
}
