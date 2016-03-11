<?php

class DateHelperTest extends PHPUnit_Framework_TestCase
{
    private $leapYears;
    private $nonLeapYears;

    public function setUp()
    {
        parent::setUp();

        $this->leapYears = [4, 2016, 2012, 104, 2020];
        $this->nonLeapYears = [1, 2, 1800, 2010, 2013, 2019];
    }

    public function testGetPaddedValues()
    {
        $values = [2014, 1, 2];
        $padded = DateHelper::getPaddedValues($values);
        $this->assertSame($padded, "20140102");
    }

    public function testIsLeapYear()
    {
        foreach ($this->leapYears as $year) {
            $this->assertTrue(DateHelper::isLeapYear($year));
        }

        foreach ($this->nonLeapYears as $year) {
            $this->assertFalse(DateHelper::isLeapYear($year));
        }
    }

    public function testGetDaysInYear()
    {
        foreach ($this->leapYears as $year) {
            $this->assertSame(DateHelper::getDaysInYear($year), 366);
        }

        foreach ($this->nonLeapYears as $year) {
            $this->assertSame(DateHelper::getDaysInYear($year), 365);
        }
    }

    public function testGetDaysInMonth()
    {
        $this->assertTrue(29 == DateHelper::getDaysInMonth(2, 2016));
        $this->assertFalse(29 == DateHelper::getDaysInMonth(2, 2015));
        $this->assertSame(29, DateHelper::getDaysInMonth(2, 104));
        $this->assertSame(28, DateHelper::getDaysInMonth(2, 1800));
        $this->assertSame(28, DateHelper::getDaysInMonth(2, 1900));

        $this->assertSame(31, DateHelper::getDaysInMonth(12, 1981));
        $this->assertSame(30, DateHelper::getDaysInMonth(11, 2001));
        $this->assertSame(31, DateHelper::getDaysInMonth(7, 2011));
        $this->assertSame(31, DateHelper::getDaysInMonth(8, 2010));
    }
}