<?php

namespace App\Livewire;

use Livewire\Component; 
use App\Models\Staff; 
use App\Models\Bus; // Import Bus model
use Livewire\WithPagination; 

class StaffManager extends Component 
{ 
    use WithPagination; 

    public $staffId, $name, $email; 

    public function render() 
    { 
        $staff = Staff::paginate(10); 
        return view('livewire.staff-manager', compact('staff')); 
    } 

    public function create() 
    { 
        $this->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:staff,email', 
        ]); 

        Staff::create([ 
            'name' => $this->name, 
            'email' => $this->email, 
        ]); 

        session()->flash('message', 'Staff member created successfully.'); 
        $this->resetInputFields(); 
    } 

    public function edit($id) 
    { 
        $staff = Staff::findOrFail($id); 
        $this->staffId = $staff->id; 
        $this->name = $staff->name; 
        $this->email = $staff->email; 
    } 

    public function update() 
    { 
        $this->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:staff,email,' . $this->staffId, 
        ]); 

        $staff = Staff::find($this->staffId); 
        $staff->update([ 
            'name' => $this->name, 
            'email' => $this->email, 
        ]); 

        session()->flash('message', 'Staff member updated successfully.'); 
        $this->resetInputFields(); 
    } 

    public function delete($id) 
    { 
        Staff::find($id)->delete(); 
        session()->flash('message', 'Staff member deleted successfully.'); 
    } 

    private function resetInputFields() 
    { 
        $this->staffId = null; 
        $this->name = ''; 
        $this->email = ''; 
    } 
}
