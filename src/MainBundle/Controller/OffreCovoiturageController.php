<?php

namespace MainBundle\Controller;

use MainBundle\Entity\OffreCovoiturage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offrecovoiturage controller.
 *
 */
class OffreCovoiturageController extends Controller
{
    /**
     * Lists all offreCovoiturage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreCovoiturages = $em->getRepository('MainBundle:OffreCovoiturage')->findAll();

        return $this->render('@Main/Offrecovoiturage/index.html.twig', array(
            'offreCovoiturages' => $offreCovoiturages,
        ));
    }

    /**
     * Creates a new offreCovoiturage entity.
     *
     */
    public function newAction(Request $request)
    {
        $offreCovoiturage = new Offrecovoiturage();
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $offreCovoiturage->setTest($usr);
        $form = $this->createForm('MainBundle\Form\OffreCovoiturageType', $offreCovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreCovoiturage);
            $em->flush();

            return $this->redirectToRoute('offrecovoiturage_show', array('idOffre' => $offreCovoiturage->getIdoffre()));
        }

        return $this->render('@Main/Offrecovoiturage/new.html.twig', array(
            'offreCovoiturage' => $offreCovoiturage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offreCovoiturage entity.
     *
     */
    public function showAction(OffreCovoiturage $offreCovoiturage)
    {
        $deleteForm = $this->createDeleteForm($offreCovoiturage);

        return $this->render('@Main/Offrecovoiturage/show.html.twig', array(
            'offreCovoiturage' => $offreCovoiturage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offreCovoiturage entity.
     *
     */
    public function editAction(Request $request, OffreCovoiturage $offreCovoiturage)
    {
        $deleteForm = $this->createDeleteForm($offreCovoiturage);
        $editForm = $this->createForm('MainBundle\Form\OffreCovoiturageType', $offreCovoiturage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offrecovoiturage_edit', array('idOffre' => $offreCovoiturage->getIdoffre()));
        }

        return $this->render('offrecovoiturage/edit.html.twig', array(
            'offreCovoiturage' => $offreCovoiturage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offreCovoiturage entity.
     *
     */
    public function deleteAction(Request $request, OffreCovoiturage $offreCovoiturage)
    {
        $form = $this->createDeleteForm($offreCovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offreCovoiturage);
            $em->flush();
        }

        return $this->redirectToRoute('offrecovoiturage_index');
    }

    /**
     * Creates a form to delete a offreCovoiturage entity.
     *
     * @param OffreCovoiturage $offreCovoiturage The offreCovoiturage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OffreCovoiturage $offreCovoiturage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offrecovoiturage_delete', array('idOffre' => $offreCovoiturage->getIdoffre())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }



  /*  public function showExpirerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreCovoiturages = $em->getRepository('MainBundle:OffreCovoiturage')->myfindCovoiturageExpirerAll();

        return $this->render('@Main/Reclamations/ReclamationCovoiturage.html.twig', array(
            'offreCovoiturages' => $offreCovoiturages,
        ));
    }*/

    public function showHistoriqueAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreCovoiturages = $em->getRepository('MainBundle:OffreCovoiturage')->myfindCovoiturageExpirerAll();

        return $this->render('@Main/Offrecovoiturage/historique.html.twig', array(
            'offreCovoiturages' => $offreCovoiturages,
        ));

    }
}
