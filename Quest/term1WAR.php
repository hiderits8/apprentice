<?php
//メインルーチン

//開始
echo '戦争を開始します。' , PHP_EOL;

//プレイヤーを決める。
$player1 = new Player();
$player1->setName('プレイヤー1');
$player2 = new Player();
$player2->setName('プレイヤー2');

//山札を作る
$normalTrump = new NormalTrump();

//カードを配る

echo 'カードが配られました。' , PHP_EOL;

//手札を場に出す
echo '戦争！' , PHP_EOL;

foreach ($players as $player)
    echo $player, 'のカードは', $suit, 'の', $number, 'です。' , PHP_EOL;


//場札を比較して判定

if() {
    //勝敗がついた時
    echo $winner , 'の勝利です。' , PHP_EOL;
} else {
    //引き分けの時
    echo '引き分けです。' , PHP_EOL;
}

//
