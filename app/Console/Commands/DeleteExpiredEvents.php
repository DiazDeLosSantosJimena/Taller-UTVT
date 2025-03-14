<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Eventos;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DeleteExpiredEvents extends Command
{
    protected $signature = 'eventos:limpiar';
    protected $description = 'Elimina eventos e imágenes expiradas';

    public function handle()
    {
        $eventosExpirados = Eventos::where('expires_at', '<', Carbon::now())->get();

        foreach ($eventosExpirados as $evento) {
            // Eliminar la imagen si no es la imagen por defecto
            if ($evento->imagen !== 'eventos.png') {
                Storage::disk('local')->delete($evento->imagen);
            }

            // Eliminar el evento
            $evento->delete();
        }

        $this->info('Eventos expirados eliminados.');
    }
}
