<?php
    date_default_timezone_set('Europe/London');

    spl_autoload_register(
      function($class) {
          static $classes = null;
          if ($classes === null) {
              $classes = array(
                  'mydate' => '/MyDate.php',
                  'date' => '/Date.php',
                  'datedifference' => '/DateDifference.php',
                  'datecalculatorinterface' => '/DateCalculatorInterface.php',
                  'datehelper' => '/DateHelper.php',
                  'datecalculator' => '/DateCalculator.php'
                );
          }
          $cn = strtolower($class);
          if (isset($classes[$cn])) {
              require __DIR__ . $classes[$cn];
          }
      }
);
