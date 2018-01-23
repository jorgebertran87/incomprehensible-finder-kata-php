<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Services;
use CodelyTV\FinderKata\Contracts\Couple;
use CodelyTV\FinderKata\Entities\Couple as CoupleEntity;
use CodelyTV\FinderKata\Exceptions\NotEnoughCouples;

final class Finder
{
    private $peopleList;

    private $differenceTypes =
        [
            Couple::CLOSEST => 'Closest',
            Couple::FURTHEST => 'Furthest',
        ];

    public function __construct(array $peopleList)
    {
        $this->peopleList = $peopleList;
    }

    public function find(int $differenceType): CoupleEntity
    {
        $couples = [];

        for ($i = 0; $i < count($this->peopleList); $i++) {
            for ($j = $i + 1; $j < count($this->peopleList); $j++) {
                $couple = $this->loadCouple($this->peopleList[$i], $this->peopleList[$j]);
                $couples[] = $couple;
            }
        }

        if (count($couples) < 1)
        {
            throw new NotEnoughCouples("There are not enough couples");
        }

        $chosenCouple = $couples[0];
        $class = "CodelyTV\\FinderKata\\Services\\".$this->differenceTypes[$differenceType]."Couple";
        $couple = new $class();

        foreach ($couples as $newCouple) {
            $chosenCouple = $couple->choose($newCouple, $chosenCouple);
        }

        return $chosenCouple;
    }

    private function loadCouple($person1, $person2)
    {
        if ($person1->birthDate()->getTimestamp() < $person2->birthDate()->getTimestamp()) {
            return new CoupleEntity($person1, $person2);
        } else {
            return new CoupleEntity($person2, $person1);
        }
    }
}
