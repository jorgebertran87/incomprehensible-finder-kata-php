<?php
namespace CodelyTV\FinderKata\Contracts;

interface Date
{
    public function __construct(string $dateTime);

    public function getDatetime() : string;

    public function getTimestamp(): int;
}