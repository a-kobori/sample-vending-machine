<?php

use Api\Database;
$database = Database::getInstance();

// このタイミングではSQLの学習は未実施のため、データベース処理はあらかじめ準備しておきます。
// SQLを準備して実行
$sql = 'SELECT * FROM drinks';
$params = [];
$result = $database->fetchAll($sql, $params);

// FIXME: これより下の行を削除して、指定された通りのレスポンスを返せるように頑張ってみてください！
// print_r($result);
$array = [];
foreach($result as $element){
  $array[$element['id']] = [
    'name' => $element['name'],
    'price' => $element['price']
  ];
}

echo json_encode($result);