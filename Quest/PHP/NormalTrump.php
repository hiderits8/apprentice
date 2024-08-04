<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/Cards.php';

class NormalTrump implements Cards
{
    //カードの配列
    public $cards = [];

    //カードをシャッフルする
    public function shuffleCards()
    {
        shuffle($this->cards);
    }

    //コンストラクタ
    public function __construct()
    {
        $suits = ['スペード', 'ハート', 'ダイヤ', 'クラブ'];
        $numbers = ['A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
        foreach ($suits as $suit) {
            foreach ($numbers as $number) {
                if ($number == 'A') {
                    $strength = 14;
                } elseif ($number == 'K') {
                    $strength = 13;
                } elseif ($number == 'Q') {
                    $strength = 12;
                } elseif ($number == 'J') {
                    $strength = 11;
                } else {
                    $strength = intval($number);
                }
                $card = [
                    'suit' => $suit,
                    'number' => $number,
                    'strength' => $strength
                ];
                array_push($this->cards, $card);
            }
        }
    }
}
