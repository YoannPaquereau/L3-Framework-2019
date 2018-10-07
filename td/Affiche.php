<?php

namespace Td;


use Symfony\Component\EventDispatcher\Event;

class Affiche
{
    public function unMot( Event $e) {
        print("  Tintin ");
    }

}