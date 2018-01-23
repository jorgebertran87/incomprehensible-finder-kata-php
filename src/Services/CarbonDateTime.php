<?php
namespace CodelyTV\FinderKata\Services;


use Carbon\Carbon;
use CodelyTV\FinderKata\Contracts\Date;

final class CarbonDateTime implements Date
{
    private $dateTime;

    public function __construct(string $date)
    {
        $this->dateTime = new Carbon($date);
    }

    public function getDatetime() : string
    {
        return $this->dateTime->toDateTimeString();
    }

    public function getTimestamp() : int
    {
        return $this->dateTime->timestamp;
    }

}