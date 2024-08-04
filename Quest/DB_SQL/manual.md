以下にテーブル作成からサンプルデータ構築までの流れを書きます、

## 1.データベースを構築します

まずMySQL に接続をして、DBを作ります。

```SQL
CREATE DATABASE db_quest;
```

MySQL Workbenchで登録したDBに接続します。

```SQL
USE db_quest;
```

## 2.ステップ1で設計したテーブルを構築します

以下のようにコードを全てのテーブルで入力し、テーブルを作成します。

```SQL
CREATE TABLE `channels` (
  `channel_id` int NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(100) NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
```

外部キー制約は、参照先の更新時は参照元でも変更、削除時は削除、になるように、

```SQL
ON DELETE RESTRICT
ON UPDATE CASCADE
```

を書くようにします。

```SQL
CREATE TABLE `db_quest`.`schedule` (
  `onair_id` INT NOT NULL AUTO_INCREMENT,
  `channel_id` INT NOT NULL,
  `episode_id` INT NOT NULL,
  `view` BIGINT NOT NULL,
  `start_time` DATETIME NOT NULL,
  `end_time` DATETIME NOT NULL,
  PRIMARY KEY (`onair_id`),
  INDEX `channel_id_idx` (`channel_id` ASC) VISIBLE,
  CONSTRAINT `channel_id`
    FOREIGN KEY (`channel_id`)
    REFERENCES `db_quest`.`channels` (`channel_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);
```

## 3.サンプルデータを入れます。サンプルデータはご自身で作成ください（ChatGPTを利用すると比較的簡単に生成できます）

先ほどまで行ったCREATE TABLE文をChatGPTに入力して、適当なサイズのサンプルデータを用意してもらいます。

生成されたコードをMySQLに入力すれば、サンプルデータが作成できます。

※外部キー制約に引っかかってエラーが出る場合があるので、データの挿入順には気をつける。
