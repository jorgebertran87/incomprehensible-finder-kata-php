<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKataTest\Algorithm;

use CodelyTV\FinderKata\Services\CarbonDateTime;
use CodelyTV\FinderKata\Exceptions\NotEnoughCouples;
use CodelyTV\FinderKata\Services\Finder;
use CodelyTV\FinderKata\Contracts\Couple;
use CodelyTV\FinderKata\Entities\Person;
use CodelyTV\FinderKata\Services\NativeDateTime;
use PHPUnit\Framework\TestCase;

final class FinderTest extends TestCase
{
    private $sue;

    private $greg;

    private $sarah;

    private $mike;

    protected function setUp()
    {
        $this->sue            = new Person("Sue", new NativeDateTime("1950-01-01"));

        $this->greg            = new Person("Greg", new NativeDateTime("1952-05-01"));

        $this->sarah            = new Person("Sarah", new CarbonDateTime("1982-01-01"));

        $this->mike            = new Person("Mike", new NativeDateTime("1979-01-01"));
    }

    /** @test */
    public function should_throw_exception_when_given_empty_list()
    {
        $this->expectException(NotEnoughCouples::class);
        $list   = [];
        $finder = new Finder($list);
        $result = $finder->find(Couple::CLOSEST);
    }

    /** @test */
    public function should_throw_exception_when_given_one_person()
    {
        $this->expectException(NotEnoughCouples::class);
        $list   = [];
        $list[] = $this->sue;
        $finder = new Finder($list);

        $result = $finder->find(Couple::CLOSEST);

        $this->assertEquals(null, $result->person1());
        $this->assertEquals(null, $result->person2());
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(Couple::CLOSEST);

        $this->assertEquals($this->sue, $result->person1());
        $this->assertEquals($this->greg, $result->person2());
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(Couple::FURTHEST);

        $this->assertEquals($this->greg, $result->person1());
        $this->assertEquals($this->mike, $result->person2());
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(Couple::FURTHEST);

        $this->assertEquals($this->sue, $result->person1());
        $this->assertEquals($this->sarah, $result->person2());
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);



        $result = $finder->find(Couple::CLOSEST);

        $this->assertEquals($this->sue, $result->person1());
        $this->assertEquals($this->greg, $result->person2());
    }
}
