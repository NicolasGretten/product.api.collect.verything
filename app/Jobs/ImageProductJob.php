<?php

namespace App\Jobs;

use App\Models\Product;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ImageProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $data = json_decode(json_encode($this->data), true);
            $product = Product::where('image_id', $data['id'])->first();
            if(!empty($product)){
                $product->image_url = $data['file_name'];
            }
        }
        catch (\Exception $e){
            Bugsnag::notifyException($e);
        }
    }
}
