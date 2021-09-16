<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;
use App\Repository\EmployeeRepository;
use App\Entity\Service;
use App\Entity\Employee;

class ServiceController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/service/{id}", name="service")
     */
    public function employeesShow(Service $service, EmployeeRepository $employeeRepository): Response
    {
        return new Response($this->render('service/showemployees.html.twig',[
            'service' => $service,
            'employees' => $employeeRepository->findBy(['service' => $service,],),
        ]));
        
    }
}
