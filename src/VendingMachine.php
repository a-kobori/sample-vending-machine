<?php

namespace src;

use src\Coins;

class VendingMachine
{
  private Coins $inputedCoins;

  public function __construct()
  {
    $this->inputedCoins = Coins::empty();
  }

  public function inputCoins(Coins $coins)
  {
    $this->inputedCoins = $this->inputedCoins->add($coins);
  }

  public function inputMenu(Menu $menu): Coins
  {
    // キレイに支払える場合を検討
    $paidCoins = $this->inputedCoins->calculateNoChargeCombination($menu->value);
    if ($paidCoins) {
      // 必要な分だけ差っ引いて返却する
      $this->inputedCoins->subtract($paidCoins);
      return $this->inputedCoins;
    }
    return Coins::empty();
  }
}