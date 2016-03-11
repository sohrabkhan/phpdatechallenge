<?php

/**
 * Class Date represents a date in the form 'YYYY/MM/DD' and offers some basic functions on it like returning the month
 * or day or years when requested.
 *
 * @author    Sohrab Khan <sohrab@sohrabkhan.com>
 * @version   0.1
 */
class Date
{
    /**
     * Date in the form 'YYYY/MM/DD'
     *
     * @var string
     */
    private $date;
    /**
     * The year as an integer
     * @var int
     */
    private $year;
    /**
     * The month as an integer
     * @var int
     */
    private $month;
    /**
     * The day as an integer
     * @var int
     */
    private $day;

    /**
     * The year index in the date format YYYY/MM/DD. The year is the 1st index [2000, 01, 30]
     */
    const YEAR_INDEX = 0;
    /**
     * The month index in the date format YYYY/MM/DD. The month is the 2nd index [2000, 01, 30]
     */
    const MONTH_INDEX = 1;
    /**
     * The day index in the date format YYYY/MM/DD. The day is the 3rd index [2000, 01, 30]
     */
    const DAY_INDEX = 2;

    public function __construct($date)
    {
        $this->date = $date;
        $this->disassemble();
    }

    /**
     * Divides the date into year, month and day and sets appropriate properties
     */
    private function disassemble()
    {
        $parts = explode("/", $this->date);

        if (count($parts) != 3) {
            throw new \InvalidArgumentException('Invalid Date format specified');
        }

        $this->year = (int) $parts[static::YEAR_INDEX];
        $this->month = (int) $parts[static::MONTH_INDEX];
        $this->day = (int) $parts[static::DAY_INDEX];
    }

    /**
     * Return the year part of the date
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the year part of the date
     *
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Return the month part of the date
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets the month part of the date
     *
     * @param int $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * Return the day part of the date
     *
* @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Sets the day part of the date
     *
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * Return the string representation of the date
     * @return string
     */
    public function __toString()
    {
        return 'Year: '. $this->year . ', Month: ' . $this->month . ', Day: ' . $this->day;
    }
}