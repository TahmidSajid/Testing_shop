<?php

namespace App\Console\Commands;

use App\Models\Cupons;
use Illuminate\Console\Command;

class CuponValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cupon-validity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check cupon dates and update it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cupons = Cupons::all();

        foreach ($cupons as $key => $cupon) {
            $cupon_id = $cupon->id;
            $cupon_validity = $cupon->cupon_validity;


            if($cupon_validity != 0){
                $cupon_validity =  $cupon_validity - 1;
                Cupons::where('id', $cupon_id)->update([
                    'cupon_validity' => $cupon_validity,
                ]);
            }
            else{
                Cupons::where('id', $cupon_id)->delete();
            }


        }
        $this->info('Command run is successfull');

    }
}
