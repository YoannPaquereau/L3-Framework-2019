<?php
require_once __DIR__ . "/../../vendor/autoload.php";

define('EV_TD_AFF','td.affiche' );

$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();

$listener = new \Td\Affiche();

$dispatcher->addListener(EV_TD_AFF, array($listener, 'unMot'));

$dispatcher->dispatch( EV_TD_AFF);