<?php

namespace Api\Context\Sample;

class Training
{
    private string $name;

    /**
     * PHPのコンストラクタ
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getSampleMessage()
    {
        $message = [];
        $message[] = "Hello, " . $this->name . "!";
        $message[] = "いまあなたは/api/context/sample/Training.phpのgetSampleMessageを呼んでいます";
        return join("\n", $message);
    }
}