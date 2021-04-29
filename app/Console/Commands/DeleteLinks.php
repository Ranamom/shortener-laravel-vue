<?php

namespace App\Console\Commands;

use App\ShortLink;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class DeleteLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remover links com validade expirada';

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
        $this->info("Removendo links expirados, aguarde...");
        $links = ShortLink::where('validateAt', '<', Carbon::now());
        $linksCount = $links->count();
        $this->info("Links expirados ($linksCount) encontrados");
        $links->delete();
        $this->info("Deletado(s) $linksCount registros");
    }
}
