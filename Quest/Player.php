<?php

class Player
{
    private $name;

    private $hands = [];

    private $takedCards = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    //山札を受け取る
    public function setHands(array $card)
    {
        array_unshift($this->hands, $card);
    }

    //手札の値を返す
    public function getHands()
    {
        return $this->hands;
    }

    //場札を受け取る
    public function setTakedCards(array $cards)
    {
        foreach ($cards as $card) {
            array_push($this->takedCards, $card);
        }
    }

    //獲得札の値を返す
    public function getTakedCards()
    {
        return $this->takedCards;
    }

    //獲得札を手札に入れる
    public function mergeHands()
    {
        shuffle($this->takedCards);
        $this->hands = $this->takedCards;
        $this->takedCards = [];
    }

    //手札を出す
    public function putHand()
    {
        $card = array_shift($this->hands);
        return $card;
    }
}
