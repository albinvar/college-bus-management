<?php

namespace App\Livewire\Admin;

use App\Models\Bus;
use App\Models\Settings;
use App\Models\Student;
use Livewire\Component;

class AssignerModeIndex extends Component
{

    public $assignerMode = false;

    public $student;

    public $bus;

    public function cancelAssignerMode()
    {
        $this->resetAssignerMode();

        return redirect()->route('admin.assigner-mode');
    }

    public function render()
    {
        // check if the system is in assigner mode
        $assignerMode = Settings::where('key', 'assigner_mode')->first();
        $this->assignerMode = $assignerMode->is_active;

        // if the assigner mode is not set, create a new one
        if (!$assignerMode) {
           $this->resetAssignerMode();
        }

        // get the assigner mode data
        $assignerModeData = json_decode($assignerMode->value);

        // get student details if the student_id is set
        $student = null;
        if ($assignerModeData->student_id) {
            $this->student = Student::find($assignerModeData->student_id);
        }

        // get bus details if the bus_id is set
        $bus = null;
        if ($assignerModeData->bus_id) {
            $this->bus = Bus::find($assignerModeData->bus_id);
        }

        return view('livewire.admin.assigner-mode-index');
    }

    private function resetAssignerMode(): void
    {
        Settings::where('key', 'assigner_mode')->update([
            'value' => json_encode(['bus_id' => null, 'student_id' => null]),
            'is_active' => false,
        ]);
    }

}
