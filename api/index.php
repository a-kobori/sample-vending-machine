<?php
/**
 * 【修正不要】
 * リクエストのメソッド、URIに応じてファイルを呼び出し分けます
 */
    $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    $requestUri = $_SERVER['REQUEST_URI'];
    $id = _getRequestId($requestUri);

    // プロダクト直下が呼び出された場合
    _checkIndex($requestMethod, $requestUri);

    // PUT, DELETEメソッドでIDが指定されていない場合
    _checkPutOrDeleteWithId($requestMethod, $id);

    // 呼び出すファイルを特定
    $fileName = _getFileName($requestMethod, $id);
    $fileFullPath = __DIR__ . $requestUri . $fileName;

    // ファイルを実行
    _runFile($fileFullPath);
    
    function _getRequestId(string $requestUri): int
    {
        $requestParts = explode('/', $requestUri);
        if (is_int(end($requestParts))) {
            return intVal(end($requestParts));
        }
        return -1;
    }

    function _checkIndex($requestMethod, $requestUri)
    {
        if ($requestMethod === "GET" && $requestUri === "/") {
            echo "Hello World! いまあなたは/api/index.phpを呼んでいます";
            exit;
        }
    }

    function _checkPutOrDeleteWithId($requestMethod, $id)
    {
        if ($requestMethod === "PUT" || $requestMethod === "DELETE") {
            if ($id === -1) {
                header('HTTP/1.0 400 Bad Request');
                echo "PUT, DELETEメソッドはIDを指定してください";
                exit;
            }
        }
    }

    function _getFileName($requestMethod, $id): string
    {
        $fileName = "";
        switch ($requestMethod) {
            case "GET":
                return $id > 0 ? 'detail.php' : 'index.php';
            case "POST":
            case "PUT":
                return "update.php";
            case "DELETE":
                return "delete.php";
            default:
                header('HTTP/1.0 405 Method Not Allowed');
                echo "GET, POST, PUT, DELETEのいずれかのメソッドを指定してください";
                exit;
        }
    }

    function _runFile($fileFullPath)
    {
        // 対象処理無し
        if ($fileFullPath && file_exists($fileFullPath)) {
            require_once $fileFullPath;
        } else {
            header('HTTP/1.0 404 Not Found');
            echo('処理対象ファイルがありません：' . $fileFullPath);
        }
    }