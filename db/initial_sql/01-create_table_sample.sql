-- codmonというデータベースの中を利用することを明記します
-- 自分であたらしく初期データを作成したい場合も、この宣言は入れてください。
USE codmon;

-- あたらしく作成するため、sampleという名前のテーブルがすでにあれば削除
DROP TABLE IF EXISTS sample;

-- sampleという名前のテーブルを作成
-- idは、自動的に連番で挿入されるように設定(ぜひ他のテーブル作成でも参考にしてください)
-- nameは、40文字までの文字列を入れることができる
CREATE TABLE sample
(
  id           INT(10) AUTO_INCREMENT,
  name     VARCHAR(40),
  PRIMARY KEY (`id`)
);

-- データを挿入
INSERT INTO sample (id, name) VALUES (1, "Suzuki");
INSERT INTO sample (id, name) VALUES (2, "Tanaka");
