<?php

namespace App\Livewire\Staff;

use App\Models\Bus;
use Livewire\Component;

class Realtime extends Component
{
    public $accessLogs;

    public function mount(Bus $bus)
    {
        // Access Logs for a specific bus
        $this->accessLogs = $bus->accessLogs()->with('user')->latest()->get();
    }

    // update the access logs in realtime
    public function updatedLogs()
    {
        $this->accessLogs = Bus::find($this->accessLogs->first()->bus_id)->accessLogs()->with('user')->latest()->get();
    }

    public function render()
    {
        // update the access logs in realtime
        $this->updatedLogs();

        return view('livewire.staff.realtime');
    }
}
