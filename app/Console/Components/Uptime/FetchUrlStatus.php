<?php

namespace App\Console\Components\Uptime;

use App\Services\Ping\Ping;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Events\Uptime\UptimeCheckFailed;
use App\Events\Uptime\UptimeCheckRecovered;

class FetchUrlStatus extends Command
{
    protected $signature = 'dashboard:fetch-uptimes';

    protected $description = 'Fetch URL uptime statuses';

    public function handle(Ping $ping)
    {
        $urls = explode(',', config('uptime.urls'));
        $ids = explode(',', config('uptime.ids'));

        foreach ($urls as $i => $url) {
            $code = $ping->check($url);
            $this->info("Pinging {$ids[$i]} ({$url}): $code");

            if ($code !== 200) {
                event(new UptimeCheckFailed($i, $url));
            } else {
                event(new UptimeCheckRecovered($i, $url));
            }
        }
    }
}
