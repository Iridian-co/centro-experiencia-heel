<?php

namespace App\Controller\Admin;

use App\Entity\CoreImage;
use App\Entity\Galeria;
use App\Entity\Locale;
use App\Entity\Seccion;
use App\Entity\Section;
use App\Entity\Setting;
use App\Entity\SettingEncrypted;
use App\Entity\Texto;
use App\Entity\TextoBig;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(LocaleCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Centro Experiencia');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('General', 'fa fa-cogs'),
            MenuItem::linkToCrud('Imagenes', 'fa fa-circle', CoreImage::class),
            MenuItem::linkToCrud('Galeria', 'fa fa-circle', Galeria::class),
            MenuItem::linkToCrud('Locales', 'fa fa-circle', Locale::class),
            MenuItem::linkToCrud('Sections', 'fa fa-circle', Seccion::class),
            MenuItem::linkToCrud('Texts', 'fa fa-circle', Texto::class),
            MenuItem::linkToCrud('TextsBig', 'fa fa-circle', TextoBig::class),
            MenuItem::linkToCrud('Settings', 'fa fa-circle', Setting::class),
            MenuItem::linkToCrud('Settings Encriptada', 'fa fa-circle', SettingEncrypted::class),

              MenuItem::subMenu('Usuarios', 'fa fa-users')->setSubItems([
                        MenuItem::linkToCrud('Administrador', 'fa fa-circle', User::class)
                      ->setDefaultSort(['id' => 'DESC'])->setController(UserAdminCrudController::class),
              ]),
        ];
    }
}
