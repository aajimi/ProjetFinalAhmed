<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Article controller.
 *
 * @Route("article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     *
     * @Route("/", name="article_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usr= $this->get('security.token_storage')->getToken()->getUser();

        $articles = $em->getRepository('MainBundle:Article')->findAll();

        return $this->render('@Main/Articleinterfaces/index.html.twig', array(
            'articles' => $articles,
            'usr'=>$usr
        ));
    }


    /**
     * Creates a new article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $article->setIdPublicateur($usr);
        $form = $this->createForm('MainBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_index', array('idArticle' => $article->getIdarticle()));



        }

        return $this->render('@Main/Articleinterfaces/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a article entity.
     *
     * @Route("/{idArticle}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('@Main/Articleinterfaces/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/{idArticle}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('MainBundle\Form\ArticleType', $article);
        //dump($article);die();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index', array('idArticle' => $article->getIdarticle()));
        }

        return $this->render('@Main/Articleinterfaces/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/{idArticle}", name="article_delete")
     * @Method("DELETE")
     */
    
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('idArticle' => $article->getIdarticle())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }













    //public function searchAction(Request $request)
    //{
    //    $em = $this->getDoctrine()->getManager();
    //    $requestString = $request->get('q');
    //    $entities =  $em->getRepository('MainBundle:Article')->findByString($requestString);
    //    if(!$entities)
    //    {
    //        $result['entities']['error'] = "there is no article with this titre";
    //    }
    //    if(strlen($requestString)==1)
    //    {
    //        $entities = $em->getRepository('MainBundle:Article')->findAll();
    //        $result['entities']=$this->getRealEntities($entities);
    //    }
    //    else
    //    {
    //        $result['entities'] = $this->getRealEntities($entities);
    //    }
    //    return new Response(json_encode($result));
   // }


























}
