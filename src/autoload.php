<?php

    spl_autoload_register(
      function($class) {
          static $classes = null;
          if ($classes === null) {
              $classes = array(
                  'mydate' => '/MyDate.php',
                  'date' => '/Date.php'
                );
          }
          $cn = strtolower($class);
          if (isset($classes[$cn])) {
              require __DIR__ . $classes[$cn];
          }
      }
);
