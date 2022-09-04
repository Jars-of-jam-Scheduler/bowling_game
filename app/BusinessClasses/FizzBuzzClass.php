<?php

namespace App\BusinessClasses;

class FizzBuzzClass
{

	public function fizzBuzz(int $number)
	{
		$shown_string = $this->isMultipleOf3($number) ? 'Fizz' : '';
		$shown_string .= $this->isMultipleOf5($number) ? 'Buzz' : '';
		
		$shown_string = $this->isNotMultiple($shown_string) ? $number : $shown_string;

		return $shown_string;
	}

	private function isMultipleOf3($number)
	{
		return $number % 3 == 0;
	}

	private function isMultipleOf5($number)
	{
		return $number % 5 == 0;
	}

	private function isNotMultiple($shown_string)
	{
		return empty($shown_string);
	}

}