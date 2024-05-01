<?php

namespace App\Livewire\Staff;

use App\Models\AccessLog;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class ManualCheckin extends Component
{

    use WithPagination;

    // checkin student
    public function checkIn($student, $bus)
    {
        // create a new access log
        $accessLog = new AccessLog();
        $accessLog->bus_id = $bus;
        $accessLog->card_token = Student::find($student)->card_token ?? null;
        $accessLog->ip_address = request()->ip();

        // check if the student exists
        $student = Student::find($student);
        if (!$student) {
            $accessLog->status = 'failed';
            $accessLog->message = 'Student not found';
            $accessLog->action = 'Manual Checkin';
            $accessLog->type = 'in';
            $accessLog->save();
            return redirect()->back()->with('error', 'Student not found');
        }

        // check if the student is already checked in
        $duplicate = AccessLog::where('user_id', $student->user_id)
            ->where('bus_id', $bus)
            ->where('type', 'in')
            ->whereDate('created_at', now())
            ->first();

        if ($duplicate) {

            return redirect()->back()->with('error', 'Student already checked in');
        }

        // complete the checkin
        $accessLog->status = 'success';
        $accessLog->message = 'Student checked in';
        $accessLog->action = 'Manual Checkin';
        $accessLog->type = 'in';
        $accessLog->user_id = $student->user_id;
        $accessLog->save();

        return redirect()->back()->with('success', 'Student checked in');
    }


    public function render()
    {
        // students on the bus
        $bus = auth()->user()->staff->bus ?? null;

        if(!$bus) {
            return redirect()->route('dashboard');
        }

        // get the students on the bus
        $students = $bus->students()->paginate(10);

        return view('livewire.staff.manual-checkin', [
            'students' => $students,
            'bus' => $bus,
        ]);
    }
}
