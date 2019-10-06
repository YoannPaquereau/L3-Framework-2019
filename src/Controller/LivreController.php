<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LivreController
{
    /**
     * @Route( "/livre/numero/{ref}")
     */
    public function numero( $ref )
    {
        return new Response(
            '<html><body>Lucky number: '.$ref.'</body></html>'
        );
    }

}