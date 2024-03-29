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
//            $brochureFile = $form['brochure']->getData();

//            if ($brochureFile) {
//                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
//                // this is needed to safely include the file name as part of the URL
//                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
//                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
//
//                // Move the file to the directory where brochures are stored
//                try {
//                    $brochureFile->move(
//                        $this->getParameter('brochures_directory'),
//                        $newFilename
//                    );
//                } catch (FileException $e) {
//                    // ... handle exception if something happens during file upload
//                }
//
//                // updates the 'brochureFilename' property to store the PDF file name
//                // instead of its contents
//                $offreLocation->setBrochureFilename($newFilename);
//            }


            if ($form->isSubmitted() && $form->isValid()) {
                $uploadedFile = $form['photoVoiture']->getData();
                $destination = './locationImg';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );

                $offreLocation->setPhotoVoiture($newFilename);
            }

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
