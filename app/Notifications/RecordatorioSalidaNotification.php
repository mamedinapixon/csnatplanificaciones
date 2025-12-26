<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecordatorioSalidaNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Recordatorio: Cierre de Asistencia')
                    ->greeting('Hola ' . $notifiable->name . ',')
                    ->line('Hemos detectado que tienes una asistencia abierta para el día de hoy.')
                    ->line('Por favor, recuerda marcar tu salida para mantener tus registros actualizados.')
                    ->action('Ir al Sistema', url('/')) // Ajustar URL según corresponda
                    ->line('Gracias por tu colaboración.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'titulo' => 'Recordatorio de Cierre de Asistencia',
            'mensaje' => 'Recuerda marcar tu salida en el sistema de asistencia.',
            'fecha' => now()->toDateTimeString(),
        ];
    }
}
