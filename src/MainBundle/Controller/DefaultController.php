<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Main\Default\index.html.twig');
    }

    public function indexFrontAction()
    {
        return $this->render('@Main\Default\indexFront.html.twig');
    }
}
