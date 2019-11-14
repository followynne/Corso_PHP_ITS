<?php
declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;
use App\Filter;

class FilterTest extends TestCase
{
  /**
   * @dataProvider getDataInput
   */
   public function testValidEmail($a, $b)
   {
     $filter = new Filter();
     $this->assertEquals($b, $filter->isEmail($a));
   }

   public function getDataInput(){
     return [
       ['foo@bar.com', true],
       ['foo', false],
       ['foo@', false]
     ];
   }

    // public function testValidEmail()
    // {
    //     $filter = new Filter();
    //     $this->assertTrue($filter->isEmail('foo@bar.com'));
    // }
    //
    // public function testInvalidEmail()
    // {
    //     $filter = new Filter();
    //     $this->assertFalse($filter->isEmail('foo'));
    // }
    //
    // public function testInvalidEmailWithAt()
    // {
    //     $filter = new Filter();
    //     $this->assertFalse($filter->isEmail('foo@'));
    // }
}
