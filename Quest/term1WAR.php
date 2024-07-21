<?php

require_once dirname(__FILE__) . '/NormalTrump.php';
require_once dirname(__FILE__) . '/Player.php';
//メインルーチン

//開始
echo '戦争を開始します。', PHP_EOL;

//プレイヤーを決める。
$player1 = new Player();
$player1->setName('プレイヤー1');
$player2 = new Player();
$player2->setName('プレイヤー2');
$players = [$player1, $player2];

//山札を作る
$normalTrump = new NormalTrump();
$normalTrump->shuffleCards();

//場札を作る
$stock = [];

//カードを配る
$startHands = intdiv(count($normalTrump->cards), count($players));
for ($i = 1; $i <= $startHands; $i++) {
    foreach ($players as $player) {
        $top = array_shift($normalTrump->cards);
        $player->setHands($top);
    }
}
echo 'カードが配られました。', PHP_EOL;

//手札を場に出す
echo '戦争！', PHP_EOL;
foreach ($players as $player) {
    $tmpHand = $player->putHand();
    $tmpHand['name'] = $player->getName();
    echo $player->getName(), 'のカードは', $tmpHand['suit'], 'の', $tmpHand['number'], 'です。', PHP_EOL;
    array_unshift($stock, $tmpHand);
}

//場札を比較して判定
function sortByKey($key_name, $sort_order, $array)
{
    foreach ($array as $key => $value) {
        $standard_key_array[$key] = $value[$key_name];
    }
    array_multisort($standard_key_array, $sort_order, $array);
    return $array;
}

$judged_stock = sortByKey('strength', SORT_DESC, $stock);


if ($judged_stock[0]['strength'] == $judged_stock[1]['strength']) {
    //引き分けの時
    echo '引き分けです。', PHP_EOL;
    //場札そのまま
} else {
    //勝敗がついた時
    foreach ($players as $player) {
        if ($player->getName() !==  $judged_stock[0]['name']) {
            continue;
        }
        $winner = $player;
    }
    echo $winner->getName(), 'の勝利です。', PHP_EOL;
    $winner->setTakedCards($stock);
}

var_dump($winner->getTakedCards());
