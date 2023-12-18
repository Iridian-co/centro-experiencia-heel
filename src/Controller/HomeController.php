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
		$activeParam = 'active';
		$view = 'home';
        return $this->render('basic/calendario.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view
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

	/**
	 * @Route("/cursos", name="cursos")
	 */
	public function cursos()
	{
		$activeParam = 'active';
		$view = 'cursos';
		return $this->render('basic/cursos.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view
		]);
	}

	/**
	 * @Route("/experiencia", name="experiencia")
	 */
	public function experiencia()
	{
		$activeParam = 'active';
		$view = 'experiencia';
		return $this->render('basic/experiencia.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view
		]);
	}

	

	/**
	 * @Route("/encuesta", name="encuesta")
	 */
	public function encuesta()
	{
		$activeParam = 'active';
		$view = 'encuesta';
		return $this->render('basic/encuesta.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view
		]);
	}
	

	/**
	 * @Route("/certificado", name="certificado")
	 */
	public function certificado()
	{
		$activeParam = 'active';
		$view = 'certificado';
		return $this->render('basic/certificado.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view
		]);
	}
}
