<?php
/**
 * 【修正不要】
 * リクエストのメソッド、URIに応じてファイルを呼び出し分けます
 */
    // autoloadを呼び、クラスを読み込む
    require_once __DIR__ . '/vendor/autoload.php';

    // リクエストのメソッド、URIを取得
    $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    $requestUri = _getRequestUri($_SERVER['REQUEST_URI']);

    // ルートの場合もしくはapiディレクトリ以外を呼び出していないかチェック
    _checkUriAndMethod($requestMethod, $requestUri);

    // PUT, DELETEメソッドでIDが指定されていない場合
    _checkPutOrDeleteWithId($requestMethod);

    // 呼び出すファイルを特定
    $fileName = _getFileName($requestMethod);
    $fileFullPath = __DIR__ . $requestUri . $fileName;

    // ファイルを実行
    _runFile($fileFullPath);
    exit;
    

    function _getRequestUri(string $requestUri): string
    {
        $id = _getRequestId($requestUri);
        if ($id > 0) {
            // $_REQUESTにidをセット
            $_REQUEST['id'] = $id;
            return str_replace(strVal($id), "", $requestUri);
        }
        return $requestUri;
    }


    function _getRequestId(string $requestUri): int
    {
        $requestParts = explode('/', $requestUri);
        if (is_numeric(end($requestParts))) {
            
            $id = intVal(end($requestParts));
            return $id;
        }
        return -1;
    }

    function _checkUriAndMethod($requestMethod, $requestUri)
    {
        if ($requestMethod === "GET" && $requestUri === "/") {
            echo "Hello World! いまあなたは/api/index.phpを呼んでいます";
            exit;
        }

        $requestParts = explode('/', $requestUri);
        if ($requestParts[1] !== "api") {
            http_response_code(400);
            echo "API経由で呼び出す処理は、/api/以下に配置してください。";
            exit;
        }
    }

    function _checkPutOrDeleteWithId($requestMethod)
    {
        if ($requestMethod === "PUT" || $requestMethod === "DELETE") {
            if ($_REQUEST['id'] <= 0) {
                http_response_code(400);
                echo "PUT, DELETEメソッドはIDを指定してください";
                exit;
            }
        }
    }

    function _getFileName($requestMethod): string
    {
        switch ($requestMethod) {
            case "GET":
                if (array_key_exists('id', $_REQUEST)) {
                    if ($_REQUEST['id'] > 0) {
                        return 'detail.php';
                    }
                }
                return 'index.php';
            case "POST":
            case "PUT":
                return "update.php";
            case "DELETE":
                return "delete.php";
            default:
                http_response_code(405);
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
            http_response_code(404);
            echo('処理対象ファイルがありません：' . $fileFullPath);
        }
    }