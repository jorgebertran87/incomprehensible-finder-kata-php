<?php
namespace CodelyTV\FinderKata\Services;

use CodelyTV\FinderKata\Contracts\Date;

final class NativeDateTime implements Date
{
    private $dateTime;

    public function __construct(string $date)
    {
        $this->dateTime = new \DateTime($date);
    }

    public function getDatetime() : string
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    public function getTimestamp() : int
    {
        return $this->dateTime->getTimestamp();
    }
}