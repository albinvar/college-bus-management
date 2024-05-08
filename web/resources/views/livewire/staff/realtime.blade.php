
<div class="py-6" wire:poll.1500ms>
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
                                            Access Logs
                                        </h2>
                                        <p class="text-sm text-gray-600">
                                            Keys you have generated to connect with third-party clients or access the API.
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
                        Action
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Type
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Message
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        User
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
                                    @forelse($accessLogs as $log)
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
                                                            {{ $log->action }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        @if($log->type == 'in')
                                                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                                                Check In
                                                            </span>
                                                        @elseif($log->type == 'out')
                                                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                                                                Check Out
                                                            </span>
                                                        @else
                                                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                                                                Others
                                                            </span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3 item-center">
                                                    @if($log->status == 'success')
                                                        <span class="float-left py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                                                                {{ $log->message }}
                                                            </span>
                                                    @elseif($log->status == 'failed')
                                                        <span class="float-left py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-600 rounded-full">
                                                                {{ $log->message }}
                                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    @if(isset($log->user->name))
                                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-sm font-medium bg-teal-100 text-teal-800 rounded-full">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                        {{  $log->user->name ?? 'Unknown' }}
                    </span>
                                                    @else
                                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-sm">
                                                                Unknown
                                                            </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        {{ $log->created_at->format('M d, Y h:i A') }} ({{ $log->created_at->diffForHumans() }})
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="hidden size-px whitespace-nowrap">
                                                <div class="px-6 py-1.5">
                                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                        <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                                        </button>
                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2" aria-labelledby="hs-table-dropdown-1">
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                    Staffs
                                                                </a>
                                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                    Students
                                                                </a>
                                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <div class="py-2 first:pt-0 last:pb-0">
                                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap" colspan="7">
                                                <div class="text-sm text-center text-gray-500">
                                                    No Access Logs found for the bus.
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
                                                    {{ $accessLogs->count() }}
                                                </span> results
                                        </p>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">

                                            <a href="" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                                Prev
                                            </a>

                                            <a href="" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
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
                    $latestLog = $accessLogs->first() ?? null;
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
                                                @if($latestLog->user->student->currentSemester->fees->remaining_amount ?? 'non' == 0)
                                                    text-green-800
                                                @else
                                                    text-red-800
                                                @endif
                                            ">
                                                @if($latestLog->user->student->currentSemester->fees->remaining_amount ?? 'non' == 0)
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