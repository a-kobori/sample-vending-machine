<?php

// context/sample/Training.phpを利用するために必要
// Training.phpのnamespace(App\Context\Sample\)とクラス名(Training)を結合して指定できる
use Api\Context\Sample\Training;

// 新しいインスタンスを作成
$training = new Training();

// TrainingインスタンスのgetSampleMessageメソッドを呼び出す
$message = $training->getSampleMessage("あなたの名前");

// 結果をそのまま出力
echo $message;