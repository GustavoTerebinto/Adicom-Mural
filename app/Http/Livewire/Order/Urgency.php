<?php

namespace App\Http\Livewire\Order;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Urgency extends Component
{
    public Model $order;

    protected $listeners = [
        'order:urgencyChanged' => 'reload'
    ];

    public function reload()
    {
        $this->order->refresh();
    }

    public function render()
    {
        return view('livewire.order.urgency');
    }
}
