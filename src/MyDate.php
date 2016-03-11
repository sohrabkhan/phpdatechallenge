<?php

class MyDate {

    public static function diff($start, $end) {
        $startDate = new Date($start);
        $endDate = new Date($end);

        $calculator = new DateCalculator();
        $calculator->setOperands([$startDate, $endDate]);
        $difference = $calculator->calculate(new DateDifference());

        // Sample object:
        return (object)array(
        'years' => $difference->getYears(),
        'months' => $difference->getMonths(),
        'days' => $difference->getDays(),
        'total_days' => $difference->getTotalDays(),
        'invert' => $difference->isInvert(),
        );

    }

}
