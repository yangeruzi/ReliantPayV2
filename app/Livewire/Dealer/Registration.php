<?php

namespace App\Livewire\Dealer;

use App\Models\Organization;
use App\Models\User;
use Livewire\Component;

class Registration extends Component
{
    public $user;
    public $business_name;
    public $business_address;
    public $business_website;
    public $business_email;
    public $business_phone;
    public $currentStep = 1;

    public function mount($userID)
    {
        $this->user = User::find($userID);
    }

    public function registerdealer()
    {
        $this->validate([
            'business_name' => 'required',
            'business_address' => 'required',
            'business_website' => 'required',
            'business_email' => 'required|email|unique:organization,business_email',
            'business_phone' => 'required',
        ]);

        $org = Organization::create([
            'dealer_id' => $this->user->id,
            'business_name' => $this->business_name,
            'business_address' => $this->business_address,
            'business_website' => $this->business_website,
            'business_email' => $this->business_email,
            'business_phone' => $this->business_phone,
        ]);

        $this->currentStep = $this->currentStep + 1;
        $this->render();
    }

    public function increaseStep()
    {
        $this->currentStep = $this->currentStep + 1;
        $this->render();
    }

    public function render()
    {   
        $org = Organization::where('dealer_id', $this->user->id)->first();
        return view('livewire.dealer.registration', compact('org'))->layout('layouts.guest-base');
    }
}
