<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- Table Section -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 grid grid-cols-12 mx-auto">


                <!-- Card -->
                <div class="flex flex-col col-span-12 md:col-span-8 px-4">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                <!-- Header -->
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800">
                                            Students Check In / Check Out
                                        </h2>
                                        <p class="text-sm text-gray-600">
                                            Keys you have generated to connect with third-party clients or access the API.
                                        </p>
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
                        Fee Status
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Bus Boarding Point
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Recorded At
                    </span>
                                            </div>
                                        </th>



                                        <th scope="col" class="hidden px-6 py-3 text-end"></th>
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
                                                        <span class="font-semibold text-gray-800">
                                                            {{ $student->name }}
                                                        </span>
                                                    </span>
                                                    <br>
                                                    @if($student->student->currentSemester)
                                                        <span class="text-xs text-gray-600">
                                                                Phone: {{ $student->phone }}
                                                            </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        <span class="font-semibold text-gray-800">
                                                            @if($student->student->currentSemester)
                                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $student->student->currentSemester->fees->remaining_amount ?? 'Non' == 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                    {{ $student->student->currentSemester->fees->remaining_amount ?? 'Non' == 0 ? 'Paid' : 'Unpaid' }}
                                                                </span>
                                                            @else
                                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                    N/A
                                                                </span>
                                                            @endif
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </td>


                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        <span class="float-left py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                                                                {{ $student->busBoardingPoint->boardingPoint->place }}
                                                         </span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3 item-center">
                                                    <button
                                                        wire:click="checkIn({{ $student->id }}, {{ $student->busBoardingPoint->bus->id }})"
                                                        wire:loading.attr="disabled" wire:target="checkIn"
                                                        wire:loading.class="opacity-50 pointer-events-none"
                                                        wire:loading.class.remove="opacity-50 pointer-events-none"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-non">
                                                            Check In
                                                    </button>
                                                </div>
                                            </td>

                                        </tr>
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
                                            Total of
                                            <span class="font-semibold text-gray-800">
                                                    {{ $students->total() }}
                                                </span> results
                                        </p>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">

                                            <a href="{{ $students->previousPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                                Prev
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


                {{-- Start --}}
                @php
                    $latestLog = $students->first() ?? null;
                @endphp

                @if($latestLog->user ?? null)
                    <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4 border border-gray-200 rounded-xl shadow-sm overflow-hidden text-slate-700 mb-auto">
                        <div
                            class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6 bg-info/10 px-4 pb-5"
                        >
                            <div
                                class="rounded-lg bg-info/10 px-4 pb-5 sm:px-5"
                            >
                                <div class="flex items-center justify-between py-3">
                                    <h2
                                        class="font-medium tracking-wide mb-3"
                                    >
                                        Last Check In / Check Out :
                                    </h2>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex justify-between">
                                        <div class="avatar h-16 w-16">
                                            <img
                                                class="rounded-full"
                                                src="{{ $latestLog->user->profile_photo_url }}"
                                                alt="image"
                                            />
                                        </div>
                                        <div>
                                            <p>Time</p>
                                            <p
                                                class="text-xl font-medium"
                                            >
                                                {{ $latestLog->created_at->format('h:i A') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <h3
                                            class="text-lg font-medium"
                                        >
                                            {{ $latestLog->user->name }}

                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Student
                                    </span>
                                        </h3>
                                        <p class="text-xs text-navy-300">
                                            {{ $latestLog->user->email }}
                                        </p>
                                    </div>
                                    <div class="space-y-3 text-xs+">
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Current Semester
                                            </p>
                                            <p class="text-right">
                                                @if(isset($latestLog->user->student->currentSemester->semester->name))
                                                    {{ $latestLog->user->student->currentSemester->semester->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Last Login
                                            </p>
                                            <p class="text-right">
                                                {{ $latestLog->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Bus Pass Status
                                            </p>
                                            <p class="text-right">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </p>
                                        </div>

                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Fees Status
                                            </p>
                                            <p class="text-right
                                                @if($latestLog->user->student->currentSemester->fees->remaining_amount == 0)
                                                    text-green-800
                                                @else
                                                    text-red-800
                                                @endif
                                            ">
                                                @if($latestLog->user->student->currentSemester->fees->remaining_amount == 0)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        Paid
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        Unpaid
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4 border border-gray-200 rounded-xl shadow-sm overflow-hidden text-slate-700">
                        <div
                            class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6 bg-info/10 px-4 pb-5"
                        >
                            <div
                                class="rounded-lg bg-info/10 px-4 pb-5 sm:px-5"
                            >
                                <div class="flex items center justify-between py-3">
                                    <h2
                                        class="font-medium tracking-wide mb-3"
                                    >
                                        Scanning Details...
                                    </h2>
                                </div>
                                @if(session('success'))
                                <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <div class="text-sm font-medium">
                                                {{ session('success') }}
                                            </div>
                                        </div>
                                        <div class="ps-3 ms-auto">
                                            <div class="-mx-1.5 -my-1.5">
                                                <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600" data-hs-remove-element="#dismiss-alert">
                                                    <span class="sr-only">Dismiss</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(session('error'))
                                <div id="dismiss-alert-2" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <div class="text-sm font-medium">
                                                {{ session('error') }}
                                            </div>
                                        </div>
                                        <div class="ps-3 ms-auto">
                                            <div class="-mx-1.5 -my-1.5">
                                                <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600" data-hs-remove-element="#dismiss-alert-2">
                                                    <span class="sr-only">Dismiss</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="text-center mt-16 ">
                                    <p class="text-sm text-gray-600">
                                    <div class="sk-folding-cube">
                                        <div class="sk-cube1 sk-cube"></div>
                                        <div class="sk-cube2 sk-cube"></div>
                                        <div class="sk-cube4 sk-cube"></div>
                                        <div class="sk-cube3 sk-cube"></div>
                                    </div>
                                    No recent check in or check out found.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- End --}}

            </div>
            <!-- End Table Section -->
        </div>
    </div>
    <style>
        .sk-folding-cube {
            margin: 40px auto;
            width: 40px;
            height: 40px;
            position: relative;
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .sk-folding-cube .sk-cube {
            float: left;
            width: 50%;
            height: 50%;
            position: relative;
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .sk-folding-cube .sk-cube:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #1189ca;
            -webkit-animation: sk-foldCubeAngle 2.4s infinite linear both;
            animation: sk-foldCubeAngle 2.4s infinite linear both;
            -webkit-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }

        .sk-folding-cube .sk-cube2 {
            -webkit-transform: scale(1.1) rotateZ(90deg);
            transform: scale(1.1) rotateZ(90deg);
        }

        .sk-folding-cube .sk-cube3 {
            -webkit-transform: scale(1.1) rotateZ(180deg);
            transform: scale(1.1) rotateZ(180deg);
        }

        .sk-folding-cube .sk-cube4 {
            -webkit-transform: scale(1.1) rotateZ(270deg);
            transform: scale(1.1) rotateZ(270deg);
        }

        .sk-folding-cube .sk-cube2:before {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .sk-folding-cube .sk-cube3:before {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .sk-folding-cube .sk-cube4:before {
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        @-webkit-keyframes sk-foldCubeAngle {
            0%, 10% {
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }
            25%, 75% {
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }
            90%, 100% {
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }
        @keyframes sk-foldCubeAngle {
            0%, 10% {
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }
            25%, 75% {
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }
            90%, 100% {
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }
    </style>
</div>
