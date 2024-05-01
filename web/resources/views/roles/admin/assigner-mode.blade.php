<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Access Logs') }}
        </h2>
    </x-slot>
<div>
    <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="space-y-4">
                <div class="max-w-xl relative flex flex-col bg-white shadow-lg rounded-xl mx-auto">
                    <div class="p-4 sm:p-10 text-center overflow-y-auto">
                        @if(false)
                        <!-- Icon -->
                        <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
          </svg>
        </span>
                        <!-- End Icon -->
                        <h3 class="mb-2 text-xl font-bold text-gray-800">
                            Assigner Mode Active
                        </h3>
                        <p class="text-gray-500">
                            Please be aware that you are in assigner mode. You can assign students bus pass from particular cbms machine attached to the bus.
                        </p>

                        <div class="bg-yellow-50 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4" role="alert">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                                        <path d="M12 9v4"></path>
                                        <path d="M12 17h.01"></path>
                                    </svg>
                                </div>
                                <div class="ms-4">
                                    <h3 class="text-left text-sm font-semibold">
                                        Please Scan the Card
                                    </h3>
                                    <div class="text-left mt-1 text-sm text-yellow-700">
                                        This action will turn on assigner mode. You can assign students bus pass by <b>scanning the issued card</b> from particular cbms machine attached to the bus.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-6">
                            <table class="w-full text-left border-collapse">
                                <thead class="text-xs font-semibold text-gray-400 uppercase">
                                    <tr>
                                        <th class="py-3 px-4 bg-gray-50">#</th>
                                        <th class="py-3 px-4 bg-gray-50">Name</th>
                                        <th class="py-3 px-4 bg-gray-50">Semester</th>
                                        <th class="py-3 px-4 bg-gray-50">Bus</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                        <tr>
                                            <td class="py-3 px-4">1</td>
                                            <td class="py-3 px-4">{{ $student->user->name }}</td>
                                            <td class="py-3 px-4">{{ $student->currentSemester ? $student->currentSemester->semester->name : 'Not assigned' }}</td>
                                            <td class="py-3 px-4">
                                                {{ $bus ? $bus->name : 'Not assigned' }}
                                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-100 bg-green-600 rounded-full">
                                                    Bus No : {{ $bus->bus_no }}
                                                </span>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                       <div class="mt-6">
                            <p class="text-xs text-gray-500">
                                This action will turn on assigner mode. You can assign students bus pass by <b>scanning the issued card</b> from particular cbms machine attached to the bus.
                            </p>
                        </div>

                        <div class="mt-6 flex justify-center gap-x-4">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-task-created-alert">
                                Cancel Linking Process
                            </button>
                        </div>
                    </div>
                    @else
                    <!-- Icon -->
                    <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-red-50 bg-red-100 text-red-500">
            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
            </svg>
        </span>
                    <!-- End Icon -->

                    <h3 class="mb-2 text-xl font-bold text-gray-800">
                        Assigner Mode Inactive
                    </h3>
                    <p class="text-gray-500">
                        You are not in assigner mode. Please use the link card option to assign students bus pass.
                    </p>

                        <div class="mt-6">
                            <p class="text-xs text-gray-500">
                                This action will turn on assigner mode. You can assign students bus pass by <b>scanning the issued card</b> from particular cbms machine attached to the bus.
                            </p>
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
</x-app-layout>
