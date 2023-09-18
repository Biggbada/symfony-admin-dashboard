<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use App\Entity\Vehicle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url =  $this->adminUrlGenerator->setController(EmployeeCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony admin');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Salariés', 'fas fa-user', Employee::class);
        yield MenuItem::linkToCrud('Véhicules', 'fas fa-car', Vehicle::class);


//        ]);

//        yield MenuItem::subMenu('Fournisseurs', 'fas fa-newspaper')->setSubItems([
//            MenuItem::linkToCrud('Tous les fournisseurs', 'fas fa-newspaper', Provider::class),
//            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Provider::class)->setAction(Crud::PAGE_NEW),


//        ]);
    }
}
