<?php

namespace App\Service;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class Mail
{
    private LoggerInterface $logger;
    public function __construct (LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @throws Exception
     */
    public function sendMail($data): Response
    {
        $this->logger->info("call send mail");
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
//        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '20ea47bca82e52';
        $phpmailer->Password = '0d49b44fab9f93';
        $phpmailer->setFrom($data->getEmail(), $data->getFirstname() . ' ' . $data->getName());
        $phpmailer->addAddress('alexis.resses@gmail.com', 'TS Menuiserie');
        $phpmailer->Subject = $data->getSubject();
        $phpmailer->Body = $data->getDemand();
        if (!$phpmailer->send()) {
            $this->logger->error('Problème envoi mail');
            return new Response('Problème envoi email', 500);
        } else {
            return new Response('email envoyé');
        }
    }
}