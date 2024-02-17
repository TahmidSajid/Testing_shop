<?php

namespace App\Livewire\User;

use App\Models\Cupons;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;
    public $key;
    public $cuponName;
    public $discount;
    public $validity;
    public $selectUsers = [];

    public function addUsers($user)
    {
        if (!in_array($user, $this->selectUsers)) {
            $this->selectUsers[$this->key] = $user;
            $this->key = $this->key + 1;
        }
    }

    public function deleteUser($user)
    {
        foreach ($this->selectUsers as $key => $value) {
            if ($value == $user) {
                unset($this->selectUsers[$key]);
                array_values($this->selectUsers);
            }
        }
    }

    public function addCupon()
    {
        $key = Str::random(5);

        foreach ($this->selectUsers as $user_id) {
            Cupons::create([
                'cupon_name' => $this->cuponName,
                'cupon_discount' => $this->discount,
                'cupon_validity' => $this->validity,
                'key' => $key,
                'user_id' => $user_id,
            ]);
        }

        $this->reset('search','key','cuponName','discount','validity','selectUsers');

    }

    public function render()
    {
        return view('livewire.user.search-users')->with([
            'cupons'=> Cupons::distinct()->get(),
            'user' => User::search($this->search)->get(),
        ]);
    }
}
