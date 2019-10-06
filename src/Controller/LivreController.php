<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    /**
     * @Route( "/livre/numero/{ref}")
     */
    public function numero( $ref )
    {
        return $this->render('livre/numero.html.twig', [
            'number' => $ref,
        ]);
    }

}