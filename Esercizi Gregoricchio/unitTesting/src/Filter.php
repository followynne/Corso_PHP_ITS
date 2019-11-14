<?php
declare(strict_types=1);

namespace App;

class Filter
{
    public function isEmail(string $email)
    {
      $regex = '/\w+\@\w+/';
      if (preg_match($regex, $email)){
        return true;
      } else {
        return false;
      }
    }
}
