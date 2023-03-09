<?php

// context/sample/Training.phpを利用するために必要
// Training.phpのnamespace(App\Context\Sample\)とクラス名(Training)を結合して指定できる
use Api\Context\Sample\Training;

// 新しいインスタンスを作成
$training = new Training("あなたの名前");

// TrainingインスタンスのgetSampleMessageメソッドを呼び出す
$message = $training->getSampleMessage();

// 配列にして、JSON化してから出力
echo $message;