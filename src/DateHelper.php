<?php

/**
 * Class DateHelper has helper function that help in the different calculations of dates.
 *
 * @author  Sohrab Khan <sohrab@sohrabkhan.com>
 * @version 0.1
 */
class DateHelper
{
    /**
     * This function is used to pad an array of values to each other and by default to the
     * size of 2.
     *
     * @param array $values Array of values to pad
     * @param int   $length The length to pad to
     * @return string
     */
    public static function getPaddedValues(array $values, $length=2)
    {
        $padded = '';
        foreach ($values as $value) {
            $padded .= str_pad($value, $length, '0', STR_PAD_LEFT);
        }
        return $padded;
    }


    public static function isLeapYear($year)
    {
        return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
    }

    public static function getDaysInYear($year)
    {
        return static::isLeapYear($year) ? 366 : 365;
    }

//    /**
//     * This function is used to find if a year is a leap year or not.
//     *
//     * @param int $year The year to find if it's a leap year
//     * @return bool
//     */
//    public static function isLeapYear($year)
//    {
//        return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
//    }
//
//    /**
//     * This function is used to find the number of days in a year when given the year.
//     *
//     * @param int $year The year to find the days in
//     * @return int
//     */
//    public static function getDaysInYear($year)
//    {
//        return static::isLeapYear($year) ? 366 : 365;
//    }

    /**
     * Returns the number of days in a particular month of a particular year
     *
     * @param int $month The month
     * @param int $year  The year
     * @return int
     */
    public static function getDaysInMonth($month, $year)
    {
        $leapDay = (static::isLeapYear($year) == true && $month == 2) ? 1 : 0;

        return ($month === 2) ? (28 + $leapDay) : 31 - ($month - 1) % 7 % 2;
    }

    /**
     * Return the number of days since the start of the year when given the day, month and year
     *
     * @param int $month The month
     * @param int $day   The day
     * @param int $year  Is the current year leap
     * @return int
     */
    public static function getDaysSinceStartOfYear($month, $day, $year)
    {
        $totalDays = 0;

        for ($counter = 0; $counter < $month; $counter ++) {
            $totalDays += static::getDaysInMonth($counter, $year);
        }

        $totalDays += $day + 1;

        return $totalDays;
    }
}