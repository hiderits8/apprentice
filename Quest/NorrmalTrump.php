<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/Cards.php';

class NormalTrump extends Cards
{
    //カードの配列
    private $cards = array();

    //コンストラクタ
    public function __construct()
    {
        $suits = ['スペード', 'ハート', 'ダイヤ', 'クラブ'];
        $numbers = ['A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
        foreach ($suits as $suit) {
            foreach ($numbers as $number) {
                $card = [
                    'suit' => $suit,
                    'number' => $number
                ];
                array_push($this->cards, $card);
            }
        }
    }
}
