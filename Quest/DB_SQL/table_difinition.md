# テーブル定義

## エピソード
テーブル名：episodes
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
エピソードID|episode_id|int|YES||||YES
番組ID|program_id|int||YES|||
シーズン数|season|int|||YES||
エピソード数|episode_no|int|||YES||
エピソードタイトル|episode_title|varchar(100)|||||
エピソード詳細|episode_ex|text|||||
動画時間|episode_time|time(0)|||||
公開日|release|date|||||

## 番組
テーブル名：programs
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
番組ID|program_id|int|YES||||YES
番組タイトル|program_title|varchar(100)|||||
番組詳細|program_ex|text|||||

## ジャンル
テーブル名：categories
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
ジャンルID|category_id|int|YES||||YES
ジャンル名|category_name|varchar(100)|||||

## 番組ジャンル
テーブル名：program_categories
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
番組ジャンルID|program_category_id|int|YES||||YES
ジャンルID|category_id|int||YES|||
番組ID|program_id|int||YES|||

## チャンネル
テーブル名：channels
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
チャンネルID|channel_id|int|YES||||YES
チャンネル名|channel_name|varchar(100)|||||


## 番組表
テーブル名：schedule
論理名|カラム名|データ型|PK|FK|NULL|INDEX|AUTO INCREMENT
-|-|-|-|-|-|-|-
放送ID|onair_id|int|YES||||YES
チャンネルID|channel_id|int||YES|||
エピソードID|episode_id|int||YES|||
視聴数|view|bigint|||||
開始時間|start_time|datetime|||||
終了時間|end_time|datetime|||||

