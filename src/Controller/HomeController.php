<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Service\MailchimpService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
	/**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home/home.html.twig', [
			'vsita_calendario' => 'calendario',
			'vsita_curso' => 'curso',
			'vsita_experiencia' => 'experiencia',
			'vsita_encuesta' => 'encuesta',
			'vsita_certificado' => 'certificado'
        ]);
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/base", name="base")
     */
    public function base()
    {
        return $this->render('home/baseMaqueta.html.twig', []);
    }

	/**
     * @Route("/login", name="login")
     */
    public function login() {
        return $this->render('user/login.html.twig', []);
    }
}
