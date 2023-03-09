<?php

// Database.phpを利用するために必要
use Api\Database;

// (接続済の)データベース用のインスタンスを取得
$database = Database::getInstance();

// URIに指定されているIDを取得
$id = $_REQUEST['id'];

// SQLを準備
$sql = 'SELECT * FROM sample WHERE id = :id';

// パラメータをセット
$params = [
    ':id' => $id,
];

// SQLを実行
$result = $database->fetchAll($sql, $params);

if (!empty($result)) {
  // 結果をフロントで処理しやすいようにJSON化してから返却する
  echo json_encode($result);
  exit;
} else {
  // 結果が空の場合(存在しないIDを検索している場合)は、404エラーを返す
  http_response_code(404);
  echo json_encode([
      'message' => 'Not Found. id:' . $id,
  ]);
}

