<?php

namespace Club2014\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('Club2014BlogBundle:Blog:index.html.twig', array('nom' => 'Antoine'));
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
        return $this->render('Club2014BlogBundle:Blog:test.html.twig');
    }
}