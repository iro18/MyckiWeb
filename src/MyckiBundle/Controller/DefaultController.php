<?php

namespace MyckiBundle\Controller;

use MyckiBundle\Entity\Page;
use MyckiBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyckiBundle:Default:index.html.twig');
    }


    public function portfoliopageAction($slug)
    {
        $em  = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('MyckiBundle:Portfolio');
        $plop = $rep->findOneBySlug($slug);
        if(null === $plop){
            throw new NotFoundHttpException('Cette page n\'a pas été trouvée');
        }
    return new Response("1");
    }
      public function simplepageAction($slug)
    {
         $plop = $this->getDoctrine()
        ->getRepository(Page::class)
        ->findOneBy(array('slug' => $slug));

            if (!$plop) {
        throw $this->createNotFoundException();
    }

        if($slug == 'portfolio'){}
        return $this->render('MyckiBundle:Page:simplePage.html.twig',array(
        	'yolo' => $plop));
    }
    public function blogPageAction(Request $request){
        $em  = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('MyckiBundle:Post');
        $allRes = $rep->findAll();

        return $this->render('MyckiBundle:Page:Blog.html.twig',array(
            'allblog' => $allRes));
    }

    public function addAction(Request $request)
    {
        $page = new Page();
        $form = $this->createForm(PageType::class,$page);

        if(null === $page){
            throw new NotFoundHttpException("Aucune annonce trouvée");
        }

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);
            $em->flush();
        }

        return $this->render('MyckiBundle:Page:AddPage.html.twig', array(
            'form' => $form->createView()
        ));

    }

}
