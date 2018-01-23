<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Contracts;

use CodelyTV\FinderKata\Entities\Couple as CoupleEntity;

interface Couple
{
    const CLOSEST = 1;
    const FURTHEST = 2;

    public function choose($couple1, $couple2) : CoupleEntity;


}
