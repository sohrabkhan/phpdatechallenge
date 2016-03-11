<?php

/**
 * Class DateCalculator is the class which performs the actual calculation. It's type of calculation depends upon
 * the type of instance that is passed to it. In this case the DateDifference instance is supplied to it and it will
 * make the DateDifference class to perform the difference calculation. When later we develop the Addition or Subtration
 * classes then this class will make them perform the appropriate operation depending upon the instance it gets.
 *
 * @author  Sohrab Khan <sohrab@sohrabkhan.com>
 * @version 0.1
 */
class DateCalculator
{
    protected $operands;

    /**
     * Set the operands i.e. the starting and ending date in case of difference, it will be date & days if we were
     * to use addition in-case that gets developed later
     *
     * @param array $operands The operands on which date calculation is to be performed
     */
    public function setOperands(array $operands)
    {
        if (count($operands) != 2) {
            throw new \InvalidArgumentException("Please supply two operands to perform the date calculation");
        }

        $this->operands = $operands;
    }

    /**
     * This is the method that will make all the classes inheriting from DateCalculatorInterface to call their
     * calculate method.
     *
     * @param DateCalculatorInterface $dateCalculator
     * @return mixed
     */
    public function calculate(DateCalculatorInterface $dateCalculator)
    {
        return $dateCalculator->calculate($this->operands);
    }
}