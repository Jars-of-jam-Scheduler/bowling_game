<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\BusinessClasses\FizzBuzzClass;

class FizzBuzzTest extends TestCase
{

    public function testFizzBuzzReturnType()
    {
		$fizz_buss_instance = new FizzBuzzClass;
        $this->assertIsString($fizz_buss_instance->fizzBuzz(0));
    }

	public function testFizzBuzzMultipleOf3Only()
    {
		$fizz_buss_instance = new FizzBuzzClass;
        $this->assertEquals('Fizz', $fizz_buss_instance->fizzBuzz(9));
    }

	public function testFizzBuzzMultipleOf5Only()
    {
		$fizz_buss_instance = new FizzBuzzClass;
        $this->assertEquals('Buzz', $fizz_buss_instance->fizzBuzz(10));
    }

	public function testFizzBuzzMultipleOf3And5()
    {
		$fizz_buss_instance = new FizzBuzzClass;
        $this->assertEquals('FizzBuzz', $fizz_buss_instance->fizzBuzz(15));
    }

}
