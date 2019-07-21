<?php

namespace MainBundle\Controller;

use MainBundle\Entity\OffreLocation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offrelocation controller.
 *
 */
class OffreLocationController extends Controller
{
    /**
     * Lists all offreLocation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreLocations = $em->getRepository('MainBundle:OffreLocation')->findAll();

        return $this->render('@Main/OffreLocationInterfaces/index.html.twig', array(
            'offreLocations' => $offreLocations,
        ));
    }

    /**
     * Creates a new offreLocation entity.
     *
     */
    public function newAction(Request $request)
    {
        $offreLocation = new Offrelocation();
        $form = $this->createForm('MainBundle\Form\OffreLocationType', $offreLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreLocation);
            $em->flush();

            return $this->redirectToRoute('offrelocation_show', array('idOffre' => $offreLocation->getIdoffre()));
        }

        return $this->render('@Main/OffreLocationInterfaces/new.html.twig', array(
            'offreLocation' => $offreLocation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offreLocation entity.
     *
     */
    public function showAction(OffreLocation $offreLocation)
    {
        $deleteForm = $this->createDeleteForm($offreLocation);

        return $this->render('offrelocation/show.html.twig', array(
            'offreLocation' => $offreLocation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offreLocation entity.
     *
     */
    public function editAction(Request $request, OffreLocation $offreLocation)
    {
        $deleteForm = $this->createDeleteForm($offreLocation);
        $editForm = $this->createForm('MainBundle\Form\OffreLocationType', $offreLocation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offrelocation_edit', array('idOffre' => $offreLocation->getIdoffre()));
        }

        return $this->render('offrelocation/edit.html.twig', array(
            'offreLocation' => $offreLocation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offreLocation entity.
     *
     */
    public function deleteAction(Request $request, OffreLocation $offreLocation)
    {
        $form = $this->createDeleteForm($offreLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offreLocation);
            $em->flush();
        }

        return $this->redirectToRoute('offrelocation_index');
    }

    /**
     * Creates a form to delete a offreLocation entity.
     *
     * @param OffreLocation $offreLocation The offreLocation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OffreLocation $offreLocation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offrelocation_delete', array('idOffre' => $offreLocation->getIdoffre())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
