<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    // public $order_number;
    // public $order_items;
    // public $user_id;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        // view()->composer('layouts.frontend',function($view){
        //     $this->user_id = auth()->user()->id;
        //     $this->order_number = Cart::where('user_id',$this->user_id)->get();
        //     $this->order_items = Cart::where('user_id',$this->user_id)->get();
        //     $view->with([
        //         'order_number' =>  Auth::user()->id,
        //         'order_items' => $this->order_items,
        //         'user_id' => $this->user_id,
        //     ]);
        // });
    }
}
