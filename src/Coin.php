<?php

namespace src;

enum Coin: int
{
    case FIVE_HUNDRED = 500;
    case HUNDRED = 100;
    case FIFTY = 50;
    case TEN = 10;

    public static function fromAmount($amount): static
    {
        switch ($amount) {
            case Coin::FIVE_HUNDRED->value:
                return Coin::FIVE_HUNDRED;
            case Coin::HUNDRED->value:
                return Coin::HUNDRED;
            case Coin::FIFTY->value:
                return Coin::FIFTY;
            case Coin::TEN->value:
                return Coin::TEN;
            default:
                throw new \Exception("不正な引数");
        }
    }
}