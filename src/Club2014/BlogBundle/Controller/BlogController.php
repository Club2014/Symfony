<?php

namespace Club2014\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException('Page inexistante (page = '.$page.') ');
        }
        return $this->render('Club2014BlogBundle:Blog:index.html.twig');
    }

    public function voirAction($id)
    {
        /*$request = $this->getRequest();
        $tag = $request->query->get('tag');
        return new Response("Affichage de l'article d'id : ".$id.", avec le tag ".$tag);*/

        /*$response = new Response(json_encode(array('id' => $id)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;*/

        /*$mailer = $this->get('mailer');
        $message = \Swift_Message::newInstance()
        ->setSubject('Hello zéro !')
        ->setFrom('tuto@symfony2.com')
        ->setTo('antoinebienvenuab@gmail.com')
        ->setBody('Test symfony2');
        $mailer->send($message);
        return new Response('Email bien envoyé');*/

        return $this->render('Club2014BlogBundle:Blog:voir.html.twig', array('id' => $id));
    }

    public function ajouterAction()
    {
        if ($this->get('request')->getMethod() == 'POST') {
            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
            return $this->redirect($this->generateUrl('Club2014blog_voir', array('id' => 5)));
        }
        return $this->render('Club2014BlogBundle:Blog:ajouter.html.twig');
    }

    public function modifierAction($id)
    {
        return $this->render('Club2014BlogBundle:Blog:modifier.html.twig');
    }

    public function supprimerAction($id)
    {
        return $this->render('Club2014BlogBundle:Blog:supprimer.html.twig');
    }
}