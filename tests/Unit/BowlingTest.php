<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use \App\BusinessClasses\BowlingClass;

use Illuminate\Support\Facades\Log;

/**
 * Tests the rowing and scoring functions
 */
class BowlingTest extends TestCase
{

    public function testOnlyGutters()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(10, 0, 0);
        $this->assertEquals(0, $bowling_instance->getScore());
    }

	public function testOnlyStrikes()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(10, 10);
		$bowling_instance->generateBonusRows(10, 10);
        $this->assertEquals(300, $bowling_instance->getScore());
    }

	public function testOnlySpares()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(10, 9, 1);
		$bowling_instance->generateBonusRows(10);
        $this->assertEquals(191, $bowling_instance->getScore());
    }

	public function test1Strike()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(1, 10);
		$bowling_instance->generateSeveralRounds(9, 0, 0);
        $this->assertEquals(10, $bowling_instance->getScore());
    }

	public function test1Spare()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(1, 9, 1);
		$bowling_instance->generateSeveralRounds(9, 0, 0);
        $this->assertEquals(10, $bowling_instance->getScore());
    }

	public function testCombination1()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(1, 10);
		$bowling_instance->generateSeveralRounds(1, 5, 5);
		$bowling_instance->generateSeveralRounds(8, 0, 0);
        $this->assertEquals(30, $bowling_instance->getScore());
    }

	public function testCombination2()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(1, 10);
		$bowling_instance->generateSeveralRounds(8, 0, 0);
		$bowling_instance->generateSeveralRounds(1, 5, 5);
		$bowling_instance->generateBonusRows(10);
        $this->assertEquals(30, $bowling_instance->getScore());
    }

	public function testCombination3()
    {
		$bowling_instance = new BowlingClass;
		$bowling_instance->generateSeveralRounds(2, 10);
		$bowling_instance->generateSeveralRounds(2, 5, 5);
		$bowling_instance->generateSeveralRounds(3, 10);
		$bowling_instance->generateSeveralRounds(2, 0, 0);
		$bowling_instance->generateSeveralRounds(1, 5, 5);
		$bowling_instance->generateBonusRows(10);
        $this->assertEquals(160, $bowling_instance->getScore());
    }

}
