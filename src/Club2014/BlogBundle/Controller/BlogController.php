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

        $articles = array(
            array('titre' => 'Mon weekend à Orlando !',
            'id' => 1,
            'auteur' => 'Moi',
            'contenu' => 'Ce weekend était trop bien.',
            'date' => new \DateTime()),
            array('titre' => 'Repetition du 14 juillet',
                'id' => 2,
                'auteur' => 'Moi',
                'contenu' => 'Bientot pret pour le jour j',
                'date' => new \DateTime()),
            array('titre' => 'Chiffre d\'affaire en hausse',
                'id' => 3,
                'auteur' => 'Moi',
                'contenu' => '+500% sur 1 an, fabuleux.',
                'date' => new \DateTime())
        );
        return $this->render('Club2014BlogBundle:Blog:index.html.twig', array('articles' => $articles));
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
        $article = array(
            'id' => 1,
            'titre' => 'Mon weekend à Orlando !',
            'auteur' => 'Moi',
            'contenu' => 'Ce weekend était trop bien.',
            'date' => new \DateTime()
        );

        return $this->render('Club2014BlogBundle:Blog:voir.html.twig', array('article' => $article));
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
        $article = array(
            'id' => 1,
            'titre' => 'Mon weekend à Orlando !',
            'auteur' => 'Moi',
            'contenu' => 'Ce weekend était trop bien.',
            'date' => new \DateTime()
        );

        return $this->render('Club2014BlogBundle:Blog:modifier.html.twig', array('article' => $article));
    }

    public function supprimerAction($id)
    {
        return $this->render('Club2014BlogBundle:Blog:supprimer.html.twig');
    }

    public function menuAction($nombre)
    {
        $liste = array(
            array('id' => 2, 'titre' => 'Mon dernier weekend !'),
            array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
            array('id' => 9, 'titre' => 'Petit test')
        );

        return $this->render('Club2014BlogBundle:Blog:menu.html.twig', array('liste_articles' => $liste));
    }
}