# 課題1: PHPの基本的な記法や処理に慣れる

## 目標

- PHPのコードをとりあえず書けるようになる
- 準備された単体テストをクリアする

## 課題詳細

次のコマンドを実行して、実行されるテストがすべて通るように実装してください。

```shell
cd ~/newcomer-training/api
composer test-training
```

## 応用

実装に利用した下記2つのファイルをそのまま使い、新しい関数、テストを作成してください。

- `api/context/sample/Training.php`
- `api/tests/context/sample/TrainingTest.php`

### ヒント

テスト用の関数のアノテーション(`@group`や`@dataProvider`のこと)は、`test_fizzBuzz`に揃えてください。  
こうすると、あたらしく作成したテストも`composer test-training`コマンドで実行可能です。

```php
/**
  * @group training
  * @dataProvider provider_hoge
  */
public function test_hoge($number, $expected)
{
}
```

`provider_hoge`は、次のような形式になります。fizzBuzzのdataProviderも参考にしてみてください。

```php
public function provider_hoge()
{
    return [
      "テストのタイトル" => [ここに渡す値を配列で定義する],
    ];
}
```

## 関連する研修

- PHP