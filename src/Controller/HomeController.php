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
		$only_login = false;
        return $this->render('basic/calendario.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
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
		$activeParam = 'active';
		$view = 'login';
		$only_login = true;
        return $this->render('user/login.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
		]);
    }

	/**
	 * @Route("/cursos", name="cursos")
	 */
	public function cursos()
	{
		$activeParam = 'active';
		$view = 'cursos';
		$only_login = false;
		return $this->render('basic/cursos.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
		]);
	}

	/**
	 * @Route("/experiencia", name="experiencia")
	 */
	public function experiencia()
	{
		$activeParam = 'active';
		$view = 'experiencia';
		$only_login = false;
		return $this->render('basic/experiencia.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
		]);
	}

	

	/**
	 * @Route("/encuesta", name="encuesta")
	 */
	public function encuesta()
	{
		$activeParam = 'active';
		$view = 'encuesta';
		$only_login = false;
		return $this->render('basic/encuesta.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
		]);
	}
	

	/**
	 * @Route("/certificado", name="certificado")
	 */
	public function certificado()
	{
		$activeParam = 'active';
		$view = 'certificado';
		$only_login = false;
		return $this->render('basic/certificado.html.twig', [
			'activeParam' => $activeParam,
			'view' => $view,
			'only_login' => $only_login
		]);
	}
}
