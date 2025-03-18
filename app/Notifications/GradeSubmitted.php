<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GradeSubmitted extends Notification
{
    use Queueable;

    protected $grade;

    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Grade Submitted')
            ->line('Your grade has been submitted.')
            ->line('Grade: ' . $this->grade);
    }
} 