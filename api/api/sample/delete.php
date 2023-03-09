<?php

// Database.phpを利用するために必要
use Api\Database;

// (接続済の)データベース用のインスタンスを取得
$database = Database::getInstance();

// URIに指定されているIDを取得
$id = $_REQUEST['id'];

// SQLを準備
$sql = 'DELETE FROM sample WHERE id = :id';

// パラメータをセット
$params = [
    ':id' => $id,
];

// SQLを実行
// このときの$resultはSQLの実行結果がboolean値(true/false)として入っている
$result = $database->delete($sql, $params);

// 結果をフロントで処理しやすいようにJSON化してから返却する
echo json_encode([
    'isSuccess' => $result,
]);