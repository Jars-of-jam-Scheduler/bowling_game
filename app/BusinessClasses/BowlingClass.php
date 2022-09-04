<?php

namespace App\BusinessClasses;

/**
 * Stores dropped pins and computes the score.
 */
class BowlingClass
{

	private array $rows_scores;

	public function __construct()
	{
		$this->rows_scores = [];
	}

	public function getRowsScores()
	{
		return $this->rows_scores;
	}

	/**
	 * For each of the <1..$generated_rounds_number> rounds, stores the dropped pins.
	 */
	public function generateSeveralRounds(int $generated_rounds_number, int $dropped_pins_row_1, int $dropped_pins_row_2 = NULL)
	{
		for($round_index = 0; $round_index < $generated_rounds_number; $round_index++) {
			$this->rows_scores[] = $dropped_pins_row_1;
			$this->rows_scores[] = isset($dropped_pins_row_2) ? $dropped_pins_row_2 : NULL;  // NULL = Handling strikes
		}
	}

	/**
	 * Stores bonus rows dropped pins.
	 */
	public function generateBonusRows(int $dropped_pins_row_1, int $dropped_pins_row_2 = NULL) {
		$this->rows_scores[] = $dropped_pins_row_1;
		if(isset($dropped_pins_row_2)) {
			$this->rows_scores[] = $dropped_pins_row_2;
		}
	}

	/**
	 * Computes the score of each round
	 */
	public function getScore()
	{
		$score = 0;

		for($row_score_index = 0; $row_score_index < count($this->rows_scores); $row_score_index += 2) {
			
			if($row_score_index > 18) {  // Not iterating on bonus rows
				break;
			}

			if($this->rows_scores[$row_score_index] == 10) {
				$score += $this->computeStrikeRoundScore($row_score_index);

			} elseif($this->rows_scores[$row_score_index] + $this->rows_scores[$row_score_index + 1] == 10) {
				$score += $this->computeSpareRoundScore($row_score_index);

			} else {
				$score += $this->computeBaseScore($row_score_index);
			}
		}

		return $score;	
	}

	private function computeStrikeRoundScore(int $row_score_index)
	{
		$row_score_strike_last_row = isset($this->rows_scores[$row_score_index + 3]) ? $this->rows_scores[$row_score_index + 3] : $this->rows_scores[$row_score_index + 4];
		return $this->rows_scores[$row_score_index] + $this->rows_scores[$row_score_index + 2] + $row_score_strike_last_row;
	}

	private function computeSpareRoundScore(int $row_score_index)
	{
		return $this->rows_scores[$row_score_index] + $this->rows_scores[$row_score_index + 1] + $this->rows_scores[$row_score_index + 2];
	}

	private function computeBaseScore(int $row_score_index)
	{
		return $this->rows_scores[$row_score_index] + $this->rows_scores[$row_score_index + 1];
	}

}