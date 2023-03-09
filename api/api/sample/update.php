<?php

// Database.phpを利用するために必要
use Api\Database;

// (接続済の)データベース用のインスタンスを取得
$database = Database::getInstance();

// URIおよびリクエストボディから必要な値を取得
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];

// $idがあればUPDATE、なければINSERT
if ($id) {
  // SQLを準備
  $sql = 'UPDATE sample SET name = :name WHERE id = :id';

  // パラメータをセット
  $params = [
      ':id' => $id,
      ':name' => $name,
  ];

  // SQLを実行
  // このときの$rowCountは、UPDATEしたレコードの数が入っている
  $rowCount = $database->update($sql, $params);

  // 1件のUPDATEに成功しているかを判定
  $isSuccess = $result === 1;

  // 結果をフロントで処理しやすいようにJSON化してから返却する
  echo json_encode([
      'id' => $id,
      'isSuccess' => $isSuccess,
  ]);
  exit;
} else {
  // SQLを準備
  $sql = 'INSERT INTO sample (name) VALUES (:name)';

  // パラメータをセット
  $params = [
      ':name' => $name,
  ];

  // SQLを実行
  // このときの$resultは、INSERTしたレコードのIDが入っている
  $lastInsertedId = $database->insert($sql, $params);

  // 結果をフロントで処理しやすいようにJSON化してから返却する
  echo json_encode([
      'id' => $lastInsertedId,
      'isSuccess' => true,
  ]);
  exit;
}



