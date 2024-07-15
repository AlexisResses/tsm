<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionalCustomerController extends AbstractController
{
    #[Route('/professionnels', name: 'professional_customer')]
    public function index(): Response
    {
        return $this->render('professional_customer/index.html.twig', [
            'controller_name' => 'ProfessionalCustomerController',
        ]);
    }
}
