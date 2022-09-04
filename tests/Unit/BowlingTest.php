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
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(10, 0, 0);
        $this->assertEquals(0, $bowling_class->getScore());
    }

	public function testOnlyStrikes()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(10, 10);
		$bowling_class->generateBonusRows(10, 10);
        $this->assertEquals(300, $bowling_class->getScore());
    }

	public function testOnlySpares()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(10, 9, 1);
		$bowling_class->generateBonusRows(10);
        $this->assertEquals(191, $bowling_class->getScore());
    }

	public function test1Strike()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(1, 10);
		$bowling_class->generateSeveralRounds(9, 0, 0);
        $this->assertEquals(10, $bowling_class->getScore());
    }

	public function test1Spare()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(1, 9, 1);
		$bowling_class->generateSeveralRounds(9, 0, 0);
        $this->assertEquals(10, $bowling_class->getScore());
    }

	public function testCombination1()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(1, 10);
		$bowling_class->generateSeveralRounds(1, 5, 5);
		$bowling_class->generateSeveralRounds(8, 0, 0);
        $this->assertEquals(30, $bowling_class->getScore());
    }

	public function testCombination2()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(1, 10);
		$bowling_class->generateSeveralRounds(8, 0, 0);
		$bowling_class->generateSeveralRounds(1, 5, 5);
		$bowling_class->generateBonusRows(10);
        $this->assertEquals(30, $bowling_class->getScore());
    }

	public function testCombination3()
    {
		$bowling_class = new BowlingClass;
		$bowling_class->generateSeveralRounds(2, 10);
		$bowling_class->generateSeveralRounds(2, 5, 5);
		$bowling_class->generateSeveralRounds(3, 10);
		$bowling_class->generateSeveralRounds(2, 0, 0);
		$bowling_class->generateSeveralRounds(1, 5, 5);
		$bowling_class->generateBonusRows(10);
        $this->assertEquals(160, $bowling_class->getScore());
    }

}
