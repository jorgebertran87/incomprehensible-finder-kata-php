<?php
namespace CodelyTV\FinderKata\Services;

use CodelyTV\FinderKata\Contracts\Couple;
use CodelyTV\FinderKata\Entities\Couple as CoupleEntity;

final class ClosestCouple implements Couple
{
    public function choose($newCouple, $currentCouple): CoupleEntity
    {
        return ($newCouple->ageDifference < $currentCouple->ageDifference) ? $newCouple : $currentCouple;
    }

}