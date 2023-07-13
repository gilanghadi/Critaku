<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification as ModelsNotification;

class Notification extends Component
{
    public function render()
    {
        $notifications = ModelsNotification::where('read_at', null)->orderBy('created_at', 'ASC')->get();
        return view('livewire.notification', compact(['notifications']));
    }
}
