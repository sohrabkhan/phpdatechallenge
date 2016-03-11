<?php

/**
 * Class DateDifference conforms to DateCalculatorInterface and is used for finding the difference
 * between two dates.
 *
 * @author  Sohrab Khan <sohrab@sohrabkhan.com>
 * @version 0.1
 */
class DateDifference implements DateCalculatorInterface
{
    /**
     * The total difference in days
     * @var int
     */
    private $totalDays;
    /**
     * If the start date is after the end date then invert is true
     * @var bool
     */
    private $invert = false;
    /**
     * The difference in days
     * @var int
     */
    private $days = 0;
    /**
     * The difference in months
     * @var int
     */
    private $months = 0;
    /**
     * The difference in years
     * @var int
     */
    private $years = 0;
    /**
     * @var int
     */
    private $currentMonth;
    /**
     * @var int
     */
    private $currentYear;

    /**
     * This is the main calculation method that when given two dates will find the difference
     * in years, months, days and total days & if the start date is after the end date
     *
     * @param array $dates The dates to find the difference between
     * @return $this
     */
    public function calculate(array $dates = [])
    {
        /** @var Date $start */
        $start = $dates[0];
        /** @var Date $end */
        $end = $dates[1];

        // If the end date is less than start date then swap the dates and set invert as true
        if (
            DateHelper::getPaddedValues([$start->getYear(), $start->getMonth(), $start->getDay()]) >
            DateHelper::getPaddedValues([$end->getYear(), $end->getMonth(), $end->getDay()])
        ) {
            list($dates[0], $dates[1]) = [$dates[1], $dates[0]];
            $this->invert = true;
        }

        $this->currentMonth = $start->getMonth();
        $this->currentYear = $start->getYear();

        $this->calculateMonthDifference($end);
        $this->calculateYearDifference($end);
        $this->calculateDayDifference($start, $end);

        return $this;
    }

    /**
     * Calculate the difference in days (if any)
     *
     * @param Date $start The start date
     * @param Date $end   The end date
     */
    private function calculateDayDifference(Date $start, Date $end)
    {
        // If the day is past the end day then it mean we have to go 1 month back
        if ($start->getDay() > $end->getDay()) {
            $this->days = DateHelper::getDaysInMonth($start->getMonth(), $start->getYear()) + $start->getDay();
            $this->months --;
        }

        if ($start->getDay() < $end->getDay()) {
            $this->days = $end->getDay() - $start->getDay();
        }

        // If the number of days is equal to the number of days in the end month then
        if ($this->days > $daysInLastMonth = DateHelper::getDaysInMonth($end->getMonth(), $end->getYear())) {
            $this->days -= $daysInLastMonth;
        }

        $this->totalDays += $this->days;
    }

    /**
     * Calculate the difference in years (if any)
     *
     * @param Date $end The end date
     */
    private function calculateYearDifference(Date $end)
    {
        // Loop through the years and keep on iterating until the end year is reached.
        for ($year = $this->currentYear; $year < $end->getYear(); $year ++) {
            $this->years ++;
            $this->totalDays += DateHelper::getDaysInYear($year);
        }
    }

    /**
     * Calculate the difference in months (if any)
     *
     * @param Date $end The end date
     */
    private function calculateMonthDifference(Date $end)
    {
        // Loop through months of the year, keeping track of the current month.
        for ($month = 0; $month < 12; $month ++) {
            // When the current month is equal to the end month then break the look
            if ($this->currentMonth == $end->getMonth()) {
                break;
            }

            // Until the end year & month is reached keep on iterating the total months.
            if (
                (int)DateHelper::getPaddedValues([$this->currentYear, $this->currentMonth]) <
                (int)DateHelper::getPaddedValues([$end->getYear(), $end->getMonth()])
            ) {
                $this->months++;
                $this->totalDays += DateHelper::getDaysInMonth($this->currentMonth, $this->currentYear);
            }

            // If the current months is December then the current month in the next iteration should
            // be January
            if ($this->currentMonth % 12 == 0) {
                $this->currentMonth = 0;
                $this->currentYear++;
            }

            $this->currentMonth ++;
        }
    }

    /**
     * @return int
     */
    public function getTotalDays()
    {
        return $this->totalDays;
    }

    /**
     * @param int $totalDays
     */
    public function setTotalDays($totalDays)
    {
        $this->totalDays = $totalDays;
    }

    /**
     * @return boolean
     */
    public function isInvert()
    {
        return $this->invert;
    }

    /**
     * @param boolean $invert
     */
    public function setInvert($invert)
    {
        $this->invert = $invert;
    }

    /**
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param int $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return int
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * @param int $months
     */
    public function setMonths($months)
    {
        $this->months = $months;
    }

    /**
     * @return int
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * @param int $years
     */
    public function setYears($years)
    {
        $this->years = $years;
    }


}