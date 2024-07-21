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
$hold = [];

//カードを配る
$startHands = intdiv(count($normalTrump->cards), count($players));
for ($i = 1; $i <= $startHands; $i++) {
    foreach ($players as $player) {
        $top = array_shift($normalTrump->cards);
        $player->setHands($top);
    }
}
echo 'カードが配られました。', PHP_EOL;


function sortByKey($key_name, $sort_order, $array)
{
    foreach ($array as $key => $value) {
        $standard_key_array[$key] = $value[$key_name];
    }
    array_multisort($standard_key_array, $sort_order, $array);
    return $array;
}

$flg = false;
while (!$flg) {

    //手札を場に出す
    echo '戦争！', PHP_EOL;
    foreach ($players as $player) {
        $tmpHand = $player->putHand();
        $tmpHand['name'] = $player->getName();
        echo $player->getName(), 'のカードは', $tmpHand['suit'], 'の', $tmpHand['number'], 'です。', PHP_EOL;
        array_unshift($stock, $tmpHand);
    }

    //場札を比較して判定
    $judged_stock = sortByKey('strength', SORT_DESC, $stock);


    if ($judged_stock[0]['strength'] == $judged_stock[1]['strength']) {
        //引き分けの時
        echo '引き分けです。', PHP_EOL;
        foreach ($stock as $card) {
            array_push($hold, $card);
        }
        $stock = [];
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
        if (!empty($hold)) {
            $winner->setTakedCards($hold);
            $hold = [];
        }
        $stock = [];
    }

    foreach ($players as $player) {
        if (is_array($player->getHands()) && empty($player->getHands())) {
            $player->mergeHands();
        }
    }

    foreach ($players as $player) {
        if (is_array($player->getHands()) && empty($player->getHands())) {
            $flg = true;
        }
    }
}

$resultPlayers = [];
foreach ($players as $player) {
    if (is_array($player->getHands()) && empty($player->getHands())) {
        echo $player->getName(), 'の手札の枚数は0枚です。';
        $looser = ['name' => $player->getName(), 'number' => 0];
        continue;
    }
    echo $player->getName(), 'の手札の枚数は', count($player->getHands()) + count($player->getTakedCards()), '枚です。';
    array_push($resultPlayers, ['name' => $player->getName(), 'number' => count($player->getHands())]);
}

echo PHP_EOL;

$resultPlayers = sortByKey('number', SORT_DESC, $resultPlayers);
array_push($resultPlayers, $looser);
for ($i = 0; $i < count($resultPlayers); $i++) {
    echo $resultPlayers[$i]['name'], 'が', $i + 1, '位です。';
}


echo PHP_EOL, '戦争を終了します。', PHP_EOL;
