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
    	$request = $this->getRequest();
    	$tag = $request->query->get('tag');
        return new Response("Affichage de l'article d'id : ".$id.", avec le tag ".$tag);
    }

    public function ajouterAction()
    {
        return $this->render('Club2014BlogBundle:Blog:test.html.twig');
    }
}