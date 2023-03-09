# コドモン新卒エンジニア研修2023 Webアプリケーション開発

## 研修の準備

[インストール方法](./docs/インストール方法.md)より、インストールを行ってください。

つぎに[研修の準備](./docs/%E7%A0%94%E4%BF%AE%E3%81%AE%E6%BA%96%E5%82%99.md)を開き、それぞれのチェックをします。

## Tips, よくある質問

### データベースを初期化したい

まず`docker-compose down`で、すべてのコンテナを停止します

つぎに`db`ディレクトリの中にある`data`ディレクトリをまとめて削除します。

削除後、`docker-compose up`で、すべてのコンテナを再開してください。このタイミングで`db/initial_sql`に格納されているSQLたちが実行されます。

## 課題

### 1. もっとも通常のパターン

```shell
# 確認コマンド
composer test-round1
```

次の条件が通るように、`runSimply`を修正。

```php
// 100円が1枚、10円が2枚
$coins = [
  '100' => 1,
  '10' => 2,
];

// コーラは120円とする
$menu = 'cola';

// 購入処理
$change = Main::runSimply($coins, $menu);

echo($change); // "nochange" (おつりがない場合)
```

```php
// 100円が2枚
$coins = [
  '100' => 2,
];

// コーラは120円とする
$menu = 'cola';

// 購入処理
$change = Main::runSimply($coins, $menu);

echo($change); // "50 1 10 3" (50円が1枚、10円が3枚)
```

### ２. 自動販売機の硬貨の枚数を考慮するパターン

```shell
# 確認コマンド
composer test-round2
```

次の条件が通るように、`run`を修正。

```php
// 自動販売機がもつ硬貨の枚数の状況。50円玉が切れている
$vendingMachineCoins = [
    '500' => 999,
    '100' => 999,
    '50' => 0,
    '10' => 999,
];

// 100円が2枚
$coins = [
  '100' => 2,
];

// コーヒーは150円とする
$menu = 'coffee';

// 投入額と注文をまとめておく
$userInput = [
  "coins" => $coins,
  "menu" => $menu,
];

// 購入処理
$change = Main::run($vendingMachineCoins, $userInput);

echo($change); // "10 5" (50円を1枚返却したいが無いので、10円を5枚返却する)
```


## linter (php-cs-fixer)

プロジェクト直下で`composer lint`を実行。`src`内が勝手にフォーマットされます。



## 重要なこと

- 開発者ツールをみる