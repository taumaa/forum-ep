<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class MailService
{
    private $config;

    public function __construct()
    {
        // Initialisation de votre configuration mail depuis le fichier config/mail.php
        $this->config = config('mail');
    }

    /**
     * Envoie un email via SMTP
     * 
     * @param string|array $to Destinataire(s)
     * @param string $subject Sujet du mail
     * @param string $content Contenu HTML du mail
     * @param array $attachments Pièces jointes [optionnel]
     * @return bool
     */
    public function sendEmail($to, $subject, $content, array $attachments = [])
    {
        try {
            Mail::send([], [], function (Message $message) use ($to, $subject, $content, $attachments) {
                $message->to($to)
                    ->subject($subject)
                    ->setBody($content, 'text/html');

                // Ajout des pièces jointes si présentes
                foreach ($attachments as $attachment) {
                    if (file_exists($attachment)) {
                        $message->attach($attachment);
                    }
                }

                // Définir l'expéditeur depuis la config
                $message->from($this->config['from']['address'], $this->config['from']['name']);
            });

            return true;
        } catch (\Exception $e) {
            // Log l'erreur ou gérer l'exception comme souhaité
            report($e);
            return false;
        }
    }
} 