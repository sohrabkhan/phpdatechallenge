<?php

/**
 * An interface for any kind of date calculation, be it date addition, date difference etc. Any kind of calculator would
 * implement this interface e.g. if we later develop DateAddition class then that class can implement this interface.
 *
 * @author  Sohrab Khan <sohrab@sohrabkhan.com>
 * @version 0.1
 */
interface DateCalculatorInterface
{
    /**
     * This is a general calculation method that accept an array of values
     * @param array $values
     * @return mixed
     */
    public function calculate(array $values = []);
}