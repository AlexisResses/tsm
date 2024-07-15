<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonalCustomerController extends AbstractController
{
    #[Route('/particuliers', name: 'personal_customer')]
    public function index(): Response
    {
        return $this->render('personal_customer/index.html.twig', [
            'controller_name' => 'PersonalCustomerController',
        ]);
    }
}
