<?php

namespace App\Jobs;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;

class PubSubJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->onQueue('pubsub');
        $this->onConnection('pubsub');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {

            $subscribers = Config::get('subscriber.subscribers');
            $pdo = DB::connection('pubsub')->getPdo();
            foreach ($subscribers as $subscriber => $topic){
                $pdo->exec('LISTEN "'.$topic.'"');
            }

            while (true) {
                while ($payload = $pdo->pgsqlGetNotify(PDO::FETCH_ASSOC, 30000)) {
                    print_r($payload['message']);
                    $subClass = array_search($payload['message'], $subscribers);
                    if ($subClass === null){
                        throw new \Exception('Class doesn\'t exist.');
                    }
                    $subInstance = new $subClass($payload);
                    $subInstance->handle();
                }
            }
        } catch (Exception $e) {
            report($e);
        }
    }
}
