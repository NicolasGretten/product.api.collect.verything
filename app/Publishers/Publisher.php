<?php

namespace App\Publishers;
use \Amranidev\MicroBus\Sns\Facades\Publisher as MicrobusPublisher;

use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use stdClass;

class Publisher {
    public static function publish($class) {
        $message = json_decode(json_encode($class->message));

        Storage::disk('publisher')->put(Carbon::now()->getTimestamp().'.log', json_encode($class->message));

        MicrobusPublisher::publish($message->to, $message->body);
    }
}
