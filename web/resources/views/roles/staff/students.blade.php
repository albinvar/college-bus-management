
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manual Attendance') }}
        </h2>
    </x-slot>
   <livewire:staff.manual-checkin />
</x-app-layout>
