<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();

        // $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        // $url = $routeBuilder->setController(ServiceCrudController::class)->generateUrl();

        // return $this->redirect($url);

        return $this->render('admin/my-dashboard.html.twig',[
            'title' => 'Bienvenu sur le tableau de bord des services',
            'description' => 'Vous allez pouvoir gérer les différents services ainsi que les employés affectés',
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Staffbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Accueil du site', 'fas fa-home','homepage');
        yield MenuItem::linkToCrud('Services','fa fa-building',Service::class);
        yield MenuItem::linkToCrud('Employés','fas fa-address-book',Employee::class);

    }
}
