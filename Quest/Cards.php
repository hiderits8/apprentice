<?php

//カードインターフェイス
abstract class Cards
{
    //カードをシャッフルする
    public function shuffleCards()
    {
        shuffle($cards);
    }
}
