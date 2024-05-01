<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AssignerModal extends Component
{
    public $student;
    public $studentId;


    public function mount($student)
    {
        $this->student = $student;
        $this->studentId = $student->id;
    }

    public function render()
    {
        return view('livewire.admin.assigner-modal');
    }
}
