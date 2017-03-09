<?php

namespace Home\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HomeOrderBundle:Default:index.html.twig');
    }
}
