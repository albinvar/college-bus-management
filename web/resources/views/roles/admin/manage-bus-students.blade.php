
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Bus Students') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Table Section -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Card -->
                    <div class="flex flex-col">


                        <div class="my-1.5 min-w-full inline-block align-middle mb-6 ">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                <!-- Header -->
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800 grow">
                                            Bus Details
                                        </h2>
                                        <p class="mt-3 text-sm text-gray-600">
                                            {{ $bus->description }}
                                        </p>
                                        <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Bus Name : <strong>{{ $bus->name }}</strong></span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Bus No : <strong>{{ $bus->bus_no }}</strong></span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Number Plate : <strong>{{ $bus->number_plate }}</strong></span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Bus Capacity : <strong>{{ $bus->capacity }}</strong></span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Bus Route :
                                                    <strong>
                                                        @foreach($bus->boardingPoints as $route)
                                                            {{ $route->place }} @if(!$loop->last) -> @endif
                                                        @endforeach
                                                    </strong>
                                                </span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Students Boarding : <strong>{{ $bus->students->count() }}</strong></span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Destination : <strong>{{ $bus->destination }}</strong></span>
                                            </li>
                                            <li class="flex items-center justify-center space-x-2">
                                                <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Bus Drivers :</span>
                                                    <strong>
                                                        @foreach($bus->driver as $driver)
                                                            <div class="inline-flex items-center">
                                                                <img src="{{ $driver->user->profile_photo_url }}" alt="{{ $driver->user->name }}" class="w-8 h-8 rounded-full mr-2 ">
                                                                {{ $driver->user->name }} ({{ $driver->user->phone }})
                                                            </div>
                                                        @endforeach
                                                    </strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                                    <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                    <!-- Header -->
                                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                        <div>
                                            <h2 class="text-xl font-semibold text-gray-800">
                                                Manage Bus Students
                                            </h2>
                                            <p class="text-sm text-gray-600">
                                                Manage all the students assigned to the buses.
                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                                    View all
                                                </a>

                                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                                    Create
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Header -->

                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="ps-6 py-3 text-start">
                                                <label for="hs-at-with-checkboxes-main" class="flex">
                                                    <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-main">
                                                    <span class="sr-only">Si No :</span>
                                                </label>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Name
                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Semester
                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Phone Number
                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Email
                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Last Activity
                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-end"></th>
                                        </tr>
                                        </thead>

                                        <tbody class="divide-y divide-gray-200">
                                        @forelse($students as $student)
                                            <tr>
                                                <td class="size-px whitespace-nowrap">
                                                    <div class="ps-6 py-3">
                                                        <label for="hs-at-with-checkboxes-1" class="flex">
                                                            <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-1">
                                                            <span class="sr-only">Checkbox</span>
                                                        </label>
                                                    </div>
                                                </td>

                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $student->name }}
                                                    </span>
                                                    </div>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $student->student->currentSemester->semester->name}}

                                                    </span>
                                                    </div>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $student->student->phone }}
                                                    </span>
                                                    </div>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $student->email }}
                                                    </span>
                                                    </div>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $student->updated_at->diffForHumans() }}
                                                    </span>
                                                    </div>
                                                </td>

                                                <td class="size-px whitespace-nowrap">
                                                    <div class="px-6 py-1.5">
                                                        <button data-hs-overlay="#hs-notifications-{{ $student->id }}" class="py-1.5 px-2 inline-flex items-center gap-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 8v4l2 2"/><path d="M12 16h.01"/></svg>
                                                            Link Card
                                                        </button>
                                                        <a href="" class="py-1.5 px-2 inline-flex items-center gap-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M12 12v9"/></svg>
                                                            Generate Fees
                                                        </a>
                                                        <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                            <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                                            </button>
                                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2" aria-labelledby="hs-table-dropdown-1">
                                                                <div class="py-2 first:pt-0 last:pb-0">
                                                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="{{ route('admin.manage-bus.access-logs', ['bus' => $student->id]) }}">
                                                                        Access Logs
                                                                    </a>
                                                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                        Parents (wip)
                                                                    </a>
                                                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                        Bus (wip)
                                                                    </a>
                                                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                        Edit (wip)
                                                                    </a>
                                                                </div>
                                                                <div class="py-2 first:pt-0 last:pb-0">
                                                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                        Delete (wip)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>



                                            <!-- Notification Modal -->

                                            <div id="hs-notifications-{{ $student->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
                                                        <div class="absolute top-2 end-2">
                                                            <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-notifications-{{ $student->id }}">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                            </button>
                                                        </div>

                                                        <div class="p-4 sm:p-10 overflow-y-auto">
                                                            <div class="mb-6 text-center">
                                                                <h3 class="mb-2 text-xl font-bold text-gray-800">
                                                                    Assigner Mode
                                                                </h3>
                                                                <p class="text-gray-500">
                                                                    Please be aware that you are in assigner mode. You can assign students bus pass from particular cbms machine attached to the bus.
                                                                </p>
                                                            </div>

                                                            <div class="space-y-4">
                                                                <!-- Card -->
                                                                <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                                                                    <label for="hs-account-activity" class="flex p-4 md:p-5">
              <span class="flex me-5">
                <svg class="flex-shrink-0 mt-1 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>

                <span class="ms-5">
                  <span class="block font-medium text-gray-800">Turn on Assigner Mode</span>
                  <span class="block text-sm text-gray-500">
                    This action will turn on assigner mode. You can assign students bus pass by <b>scanning the issued card</b> from particular cbms machine attached to the bus.
                  </span>
                </span>
              </span>

                                                                        </label>
                                                                </div>
                                                                <!-- End Card -->

                                                                <!-- Card -->
                                                                <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                                                                    <label for="hs-meetups-near-you" class="flex p-4 md:p-5">
              <span class="flex me-5">
                <svg class="flex-shrink-0 mt-1 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                <span class="ms-5">
                  <span class="block font-medium text-gray-800">Verify your details</span>
                  <span class="block text-sm text-gray-500">
                      Name : <strong>{{ $student->name }}</strong><br>
                      Semester : <strong>{{ $student->student->currentSemester->semester->name }}</strong><br>
                      Bus : <strong>{{ $student->busBoardingPoint->bus->name }} (bus no : {{ $student->busBoardingPoint->bus->bus_no }})</strong>
                  </span>
                </span>
              </span>

                                                                    </label>
                                                                </div>
                                                                <!-- End Card -->

                                                                <!-- Card -->
                                                                <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                                                                    <label for="hs-preline-communication" class="flex p-4 md:p-5">
              <span class="flex me-5">
                <svg class="flex-shrink-0 mt-1 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>

                <span class="ms-5">
                  <span class="block font-medium text-gray-800">Scan the issued card</span>
                  <span class="block text-sm text-gray-500">
                    Please scan the issued card from the particular cbms machine attached to the bus. This will assign the student bus pass.
                  </span>
                </span>
              </span>

                                                                    </label>
                                                                </div>
                                                                <!-- End Card -->
                                                            </div>
                                                        </div>

                                                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                                                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-notifications-{{ $student->id }}">
                                                                Cancel
                                                            </button>
                                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                                                Start Linking Process
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        @empty
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap" colspan="7">
                                                    <div class="text-sm text-center text-gray-500">
                                                        No students found.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <!-- End Table -->

                                    <!-- Footer -->
                                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                                        <div>
                                            <p class="text-sm text-gray-600 ">
                                                <span class="font-semibold text-gray-800">
                                                    {{ $students->firstItem() }}-{{ $students->lastItem() }}
                                                </span> results
                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                <a href="{{ $students->previousPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                                    Previous
                                                </a>

                                                <a href="{{ $students->nextPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                    Next
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Table Section -->
            </div>
        </div>
    </div>
</x-app-layout>
