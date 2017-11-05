<?php
/**
 * Created by PhpStorm.
 * User: bootta
 * Date: 01.11.17
 * Time: 10:12
 */

namespace Json\Controller;

class Calculator
{
	/**
	 * Return sum of two variables
	 *
	 * @param  int $x
	 * @param  int $y
	 * @return int
	 */
	public function add($x, $y)
	{
		return $x + $y;
	}

	/**
	 * Return difference of two variables
	 *
	 * @param  int $x
	 * @param  int $y
	 * @return int
	 */
	public function subtract($x, $y)
	{
		return $x - $y;
	}

	/**
	 * Return product of two variables
	 *
	 * @param  int $x
	 * @param  int $y
	 * @return int
	 */
	public function multiply($x, $y)
	{
		return $x * $y;
	}

	/**
	 * Return the division of two variables
	 *
	 * @param  int $x
	 * @param  int $y
	 * @return float
	 */
	public function divide($x, $y)
	{
		return $x / $y;
	}
}