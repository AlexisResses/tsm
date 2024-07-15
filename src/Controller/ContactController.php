<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Mail;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]


    public function index(Request $request, Mail $mail): Response
    {

        $formContact = $this->createForm(ContactType::class);

        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $result = $mail->sendMail($formContact->getData());
            if($result->getStatusCode() === 200) {
                $this->addFlash('success',"Merci pour votre demande. Nous vous contacterons prochainement");
                return $this->redirectToRoute('home');
            } else {
                $this->addFlash('error',"Le service est temporairement indisponible. Veuillez nous recontacter ultérieurement");
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $formContact->createView(),
        ]);
    }
}
