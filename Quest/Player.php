<?php

class Player
{
    private $name;

    private $hands = [];

    private $takedCards;

    // public function __construct()
    // {

    // }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setHands(array $card)
    {
    }

    public function getName()
    {
        return $this->name;
    }

    //手札を出す
    public function putCards()
    {
        $myCard = array_shift($this->hands);
        array_unshift($myCard, ['name' => self::getName()]);
        return $myCard;
    }
}
