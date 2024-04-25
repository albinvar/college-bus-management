<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;

class RealtimeUpdates extends Component
{

    public $updates = [];

    public function render()
    {
        // real-time updates for students

        // retrieve access logs for the student
        $updates = auth()->user()->accessLogs()->latest()->paginate(5);

        return view('livewire.student.realtime-updates', [
            'updates' => $updates,
        ]);
    }
}
