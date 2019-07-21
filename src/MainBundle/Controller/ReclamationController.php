<?php

namespace MainBundle\Controller;

use MainBundle\Entity\OffreCovoiturage;
use MainBundle\Entity\Reclamation;
use MainBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Reclamation controller.
 *
 * @Route("reclamation")
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     * @Route("/", name="reclamation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usr= $this->get('security.token_storage')->getToken()->getUser();

        $reclamations = $em->getRepository('MainBundle:Reclamation')->findAll();

        return $this->render('@Main/Reclamations/showReclamation.html.twig', array(
            'reclamations' => $reclamations,
            'usr'=> $usr
        ));
    }

    /**
     * Creates a new offreCovoiturage entity.
     *
     */
    public function newReclamationAction(Request $request , OffreCovoiturage $covoiturage)
    {
        $reclamation = new Reclamation();
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $reclamationForm = $this->createForm('MainBundle\Form\ReclamationType', $reclamation);
        $reclamationForm->handleRequest($request);


        if ($reclamationForm->isSubmitted() && $reclamationForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $reclamation->setIdReclamant($usr);
            $reclamation->setIdReclame($covoiturage->getTest());
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('ShowReclamationList', array('idOffre' => $reclamation->getIdoffre()));
        }

        return $this->render('@Main/Reclamations/ReclamationCovoiturage.html.twig', array(
            'reclamation' => $reclamation,
            'reclamationForm' => $reclamationForm->createView(),
        ));
    }

    /**
     * Finds and displays a reclamation entity.
     *
     */
    public function showReclamationAction()
    {
        //Reclamation $reclamation

        return $this->render('@Main/Reclamations/showReclamation.html.twig');
    }

    public function newSignalerAction(Request $request , OffreCovoiturage $covoiturage)
    {
    $user = new Utilisateur() ;
    $user->setNbrSignal($user->getNbrSignal()+1);
    $user = $covoiturage->getIdUser();

        $em = $user->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();



        return $this->render('@Main/Reclamations/showSignaler.html.twig');
    }


}
