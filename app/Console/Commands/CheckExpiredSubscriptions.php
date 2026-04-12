<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Shopkeeper;
use Carbon\Carbon;

class CheckExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and deactivate expired subscriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking for expired subscriptions...');

        // Get shopkeepers with active plans that have expired
        $expiredShopkeepers = Shopkeeper::where('plan_status', 'active')
            ->where('plan_expiry', '<', Carbon::now())
            ->get();

        $count = 0;
        foreach ($expiredShopkeepers as $shopkeeper) {
            $shopkeeper->update(['plan_status' => 'expired']);
            $this->info("Deactivated subscription for shopkeeper: {$shopkeeper->name} (ID: {$shopkeeper->id})");
            $count++;
        }

        $this->info("Deactivated {$count} expired subscriptions.");
        return Command::SUCCESS;
    }
}
