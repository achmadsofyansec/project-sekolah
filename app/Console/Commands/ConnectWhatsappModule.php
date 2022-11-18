<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConnectWhatsappModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wa:connect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running AddOn WhatsApp Module if Module Not Connected';

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
     * @return int
     */
    public function handle()
    {
        return $this->exec();
    }
}
