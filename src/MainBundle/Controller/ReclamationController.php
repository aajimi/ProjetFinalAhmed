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

    {   $em = $this->getDoctrine()->getManager();

        $utilisateur = $em->getRepository('MainBundle:Utilisateur')->findOneBy($covoiturage->getIdUser()->getValues());
        $utilisateur->setNbrSignal($utilisateur->getNbrSignal()+1);

        if ($utilisateur->getNbrSignal() == 5){

            $utilisateur->setFlagActif(null);


        }
        $em->persist($utilisateur);
        $em->flush();

        /**
         * Signaler mail
         */
        //$transport = new \Swift_SmtpTransport();

        //$mailer = new \Swift_Mailer();
        $variable=  $utilisateur->getEmail();
        $message = (new \Swift_Message('test a changer'))
            ->setFrom('service@coovoiturage.com')
            ->setTo($variable)
            ->setBody(
                $this->renderView(
                    'Emails/signaler.html.twig',
                    [
                        'utilisateur'  =>  $utilisateur
                    ]
                ),
                'text/html'
            );

//dump($variable);
//die();
        $this->get('mailer')->send($message);
        //$mailer->send($message);

        return $this->render('@Main/Reclamations/showSignaler.html.twig');
    }


    /**
     * Deletes a article entity.
     *
     */
/** edit reclamation  */

    public function editAction( Request $request , Reclamation $reclamation)
    {
     //  $deleteForm = $this->createDeleteForm($reclamation);
     /**   $editForm = $this->createForm('MainBundle\Form\A', $reclamation); */
      //$reclamation= new Reclamation();
      //dump($reclamation);die();
        $editForm = $this->createForm('MainBundle\Form\ReclamationType',$reclamation);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           /** return $this->redirectToRoute('article_index', array('idArticle' => $reclamation->getIdarticle())); */
       return $this->redirectToRoute('ShowReclamationList');

        }

        return $this->render('@Main/Reclamations/editReclamation.html.twig', array(
            'reclamation' => $reclamation,
            'edit_reclamationForm' => $editForm->createView(),
        //    'delete_form' => $deleteForm->createView(),
        ));
    }












}
