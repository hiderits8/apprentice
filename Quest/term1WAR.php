<?php

require_once dirname(__FILE__) . '/TrumpWithJoker.php';
require_once dirname(__FILE__) . '/NormalTrump.php';
require_once dirname(__FILE__) . '/Player.php';
//メインルーチン

//開始
echo '戦争を開始します。', PHP_EOL;

echo 'プレイヤーの人数を入力してください（2〜5）: ';
$numberOfPlayers = (int)trim(fgets(STDIN));

//プレイヤーを決める。
for ($i = 1; $i <= $numberOfPlayers; $i++) {
    echo "プレイヤー{$i}の名前を入力してください: ";
    $name = trim(fgets(STDIN));
    $players[$i] = new Player($name);
}

//山札を作る

//山札選ぶとき

// echo 'ジョーカーを含めますか？（y/n）: ';
// $joker = trim(fgets(STDIN));
// if ($joker == 'y') {

$playingCards = new TrumpWithJoker();

// } else {
//     $playingCards = new NormalTrump();
// }
$playingCards->shuffleCards();


//場札を作る
$stock = [];
$hold = [];

//カードを配る
$startHands = intdiv(count($playingCards->cards), count($players));
for ($i = 1; $i <= $startHands; $i++) {
    foreach ($players as $player) {
        $top = array_shift($playingCards->cards);
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
        if ($tmpHand['suit'] == 'ジョーカー') {
            echo $player->getName(), 'のカードは', $tmpHand['suit'], 'です。', PHP_EOL;
        } else {
            echo $player->getName(), 'のカードは', $tmpHand['suit'], 'の', $tmpHand['number'], 'です。', PHP_EOL;
        }
        array_unshift($stock, $tmpHand);
    }

    //場札を比較して判定
    $judged_stock = sortByKey('strength', SORT_DESC, $stock);

    //スペードのエースを持っている人がいるか
    $aceSpade = false;
    foreach ($judged_stock as $card) {
        if ($card['suit'] == 'スペード' && $card['number'] == 'A') {
            $aceSpade = true;
        }
    }

    if ($aceSpade && $judged_stock[0]['strength'] == 14 && $judged_stock[1]['strength'] == 14) {
        //世界一の時
        foreach ($judged_stock as $card) {
            if ($card['suit'] == 'スペード' && $card['number'] == 'A') {
                $winnerName = $card['name'];
                foreach ($players as $player) {
                    if ($player->getName() == $winnerName) {
                        $winner = $player;
                    }
                }
            }
        }
        echo $winner->getName(), 'の勝利です。', PHP_EOL;
        $winner->setTakedCards($stock);
        if (!empty($hold)) {
            $winner->setTakedCards($hold);
            $hold = [];
        }
        $stock = [];
    } elseif ($judged_stock[0]['strength'] == $judged_stock[1]['strength']) {
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
