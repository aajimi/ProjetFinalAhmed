<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $authChecker = $this->container->get('security.authorization_checker');
        $router = $this->container->get('router');

        if ($usr->getFlagActif()== "validé") {
            if ($authChecker->isGranted('ROLE_ADMIN')) {
                return new RedirectResponse($router->generate('main_homepage'), 307);
            }

            if ($authChecker->isGranted('ROLE_USER')) {
                return new RedirectResponse($router->generate('offrecovoiturage_index'), 307);

            }
        }


            return $this->redirectToRoute('fos_user_security_logout');


    }
}
