<?php

declare(strict_types=1);

//カードインターフェイス
abstract class Cards
{
    //カードをシャッフルする
    public function shuffleCards()
    {
        shuffle($cards);
    }
}
