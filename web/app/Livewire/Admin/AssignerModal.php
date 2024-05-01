<?php

namespace App\Livewire\Admin;

use App\Models\Settings;
use Livewire\Attributes\On;
use Livewire\Component;

class AssignerModal extends Component
{
    public $student;
    public $busId;


    public function mount($student, $busId = null)
    {
        $this->student = $student;
        $this->busId = $busId;
    }

    public function assign()
    {
        // create a json object {"bus_id":null,"student_id":null}
        $data = [
            'bus_id' => $this->busId,
            'student_id' => $this->student->id,
        ];

        // update the assigner mode in the settings table
        $assignerMode = Settings::where('key', 'assigner_mode')->first();

        if ($assignerMode) {
            $assignerMode->update([
                'value' => json_encode($data),
                'is_active' => true,
            ]);
        }

        // emit an event to the parent component USING dispatch
        $this->dispatch('studentAssigned');
    }

    #[On('studentAssigned')]
    public function refreshPage()
    {
        return redirect()->route('admin.assigner-mode');
    }

    public function render()
    {
        return view('livewire.admin.assigner-modal');
    }
}
