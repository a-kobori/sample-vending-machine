<?php

require_once(__DIR__ . "/../../../vendor/autoload.php");

use Api\Context\Sample\Training;
use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase
{
    /**
     * @group training
     * @dataProvider provider_fizzBuzz
     */
    public function test_fizzBuzz($number, $expected)
    {
        // Given
        $training = new Training();

        // When
        $actual = $training->fizzBuzz($number);

        // Then
        $this->assertSame($actual, $expected);
    }

    public function provider_fizzBuzz()
    {
        // test_fizzBuzz関数の$number, $expectedに渡す値を定義している
        return [
          "1のときは1を返す" => [1, "1"], // ex. $number = 1, $expected = "1"
          "2のときは2を返す" => [2, "2"],
          "3のときはFizzを返す" => [3, "Fizz"],
          "4のときは4を返す" => [4, "4"],
          "5のときはBuzzを返す" => [5, "Buzz"],
          "6のときはFizzを返す" => [6, "Fizz"],
          "7のときは7を返す" => [7, "7"],
          "8のときは8を返す" => [8, "8"],
          "9のときはFizzを返す" => [9, "Fizz"],
          "10のときはBuzzを返す" => [10, "Buzz"],
          "11のときは11を返す" => [11, "11"],
          "12のときはFizzを返す" => [12, "Fizz"],
          "13のときは13を返す" => [13, "13"],
          "14のときは14を返す" => [14, "14"],
          "15のときはFizzBuzzを返す" => [15, "FizzBuzz"],
          "16のときは16を返す" => [16, "16"],
        ];
    }
}
