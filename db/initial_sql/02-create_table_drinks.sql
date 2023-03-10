USE codmon;

DROP TABLE IF EXISTS drinks;

CREATE TABLE drinks
(
  id           INT(10) AUTO_INCREMENT,
  name     VARCHAR(40),
  price        INT(10),
  PRIMARY KEY (`id`)
);

-- データを挿入
INSERT INTO drinks (name, price) VALUES ("コーラ", 120);
INSERT INTO drinks (name, price) VALUES ("お茶", 150);
