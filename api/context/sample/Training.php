<?php

namespace Api\Context\Sample;

class Training
{
    private string $name;

    /**
     * PHPのコンストラクタ
     */
    public function __construct()
    {
        // do nothing
    }

    public function getSampleMessage(string $name)
    {
        $message = [];
        $message[] = "Hello, " . $name . "!";
        $message[] = "いまあなたは/api/context/sample/Training.phpのgetSampleMessageを呼んでいます";
        return join("\n", $message);
    }

    /**
     * FizzBuzzの実装
     * 3の倍数のときはFizz
     * 5の倍数のときはBuzz
     * 15の倍数のときはFizzBuzz
     * をそれぞれ返却する
     *
     * @param integer $number
     * @return string
     */
    public function fizzBuzz(int $number): string
    {
        return "Not implemented";
    }
}