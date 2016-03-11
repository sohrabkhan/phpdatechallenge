<?php

/**
 * Class DateDifferenceTest
 * @author    Sohrab Khan <sohrab@sohrabkhan.com>
 * @version   0.1
 */
class DateDifferenceTest extends PHPUnit_Framework_TestCase
{
    public function testCalculate()
    {
        $difference = new DateDifference();
        $start = new Date('2014/01/01');
        $end = new Date('2014/03/01');

        $result = $difference->calculate([$start, $end]);

        $this->assertEquals(0, $result->getDays());
        $this->assertEquals(2, $result->getMonths());
        $this->assertEquals(0, $result->getYears());
        $this->assertEquals(59, $result->getTotalDays());
    }
}