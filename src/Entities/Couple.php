<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Entities;

final class Couple
{
    private $person1;

    private $person2;

    public $ageDifference;

    public function __construct($person1, $person2)
    {
        $this->person1 = $person1;
        $this->person2 = $person2;
        $this->calculateDifference();
    }

    public function person1()
    {
        return $this->person1;
    }

    public function person2()
    {
        return $this->person2;
    }

    public function ageDifference()
    {
        return $this->ageDifference;
    }

    private function calculateDifference()
    {
        $this->ageDifference = $this->person2->birthDate()->getTimestamp()
        - $this->person1->birthDate()->getTimestamp();
    }
}
