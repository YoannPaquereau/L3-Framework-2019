<?php
require_once __DIR__.'/../../vendor/autoload.php';

define('EV_COURS_AFF','cours.affiche' );

$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();

$listener = function () {
    print "J'écoute le dispatcher";
};

$dispatcher->addListener(EV_COURS_AFF, $listener);
$dispatcher->dispatch( EV_COURS_AFF);