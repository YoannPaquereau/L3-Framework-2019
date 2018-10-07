<?php
require_once __DIR__."/../../vendor/autoload.php";

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

// Définition d'une constante représentant l'événement
define('EV_TD_AFF','td.affiche' );

$dispatcher = new EventDispatcher();


// ajout d'un listener de type class+methode avec la priorité par defaut 0
$listener = new \Td\Affiche();
$dispatcher->addListener(EV_TD_AFF, array($listener, 'unMot'));

// ajout d'un listener de type fonction anonyme (priorité -1 )
$dispatcher->addListener(EV_TD_AFF, function (Event $e) {
    print(" Au-revoir ");
}, -1 );

// Déclaration d'une fonction affiche et ajout comme listener de priorité 1
function affiche( Event $e ) {
    print(" Bonjour ");
}
$dispatcher->addListener( EV_TD_AFF, 'affiche', 1);



// déclanchement de l'événement
$dispatcher->dispatch( EV_TD_AFF);