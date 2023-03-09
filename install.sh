# (イメージをビルドしたあと)イメージからコンテナを起動する
docker-compose up -d --build

# PHPのcomposerライブラリをインストール
docker-compose exec api composer install

# JavaScriptのnpmライブラリをインストール
docker-compose exec web npm install
