<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteAdminAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-admin-access-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function __invoke()
    {
        $now = Carbon::now();
        DB::table('admin_access_tokens')
            ->where('expires_at', '<', $now)->delete();

        $this->info("Admin access token deleted");

    }
}
