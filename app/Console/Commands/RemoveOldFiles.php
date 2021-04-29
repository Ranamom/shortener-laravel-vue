<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveOldFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:deleteOlds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remover arquivos de links expirados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("# Deletando arquivos antigos #");
        collect(Storage::disk("public")->listContents("storage"))
            ->each(function ($file) {
                if ($file['timestamp'] < now()->subDays(10)->getTimestamp()) {
                    $this->info("Apagando: " + $file['path']);
                    Storage::delete($file['path']);
                }
            });
        $this->info("# Processo finalizado #");
    }
}
