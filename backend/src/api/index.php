<?php
    // HTTPメソッドを取得
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);
    

    // // 処理ディレクトリが存在するか
    // $target_directory = __DIR__ . '/' .$kind . '/' . $target.'/';
    // if (!is_dir($target_directory)) {
    //     header("HTTP/1.1 404 Not Found");
    // }
    // // PUTとDELETEの場合はidが必須
    // if (in_array($request_method, ['PUT', 'DELETE'])) {
    //     if (!$id && !arrayValue($_REQUEST, 'id')) {
    //         // 更新対象のID指定が無い
    //         header('HTTP/1.0 400 Bad Request');
    //         exit;
    //     }
    // }
    // switch ($request_method) {
    // case 'GET':
    //     $filename = $id ? 'detail.php' : 'index.php';
    //     break;
    // case 'DELETE':
    //     $filename = 'delete.php';
    //     break;
    // default:
    //     $filename = 'update.php';
    // }
    // $filename = $target_directory.$filename;
  

    // if ($filename && file_exists($filename)) {
    //     // 処理対象のファイルを実行
    //     require_once($filename);
    //     if ($from_codmon_connect) {
    //         login::adminLogout();
    //     }
    //     exit;
    // }
    // // 対象処理無し
    // $errorlog->write('処理対象ファイルがありません：'.$filename);
    // if ($from_codmon_connect) {
    //     login::adminLogout();
    // }
    // header('HTTP/1.1 405 Method Not Allowed');
