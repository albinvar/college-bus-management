<div
    class="grid grid-cols-12 gap-4"
>
    {{-- Start --}}
    <div class="col-span-12 lg:col-span-8 xl:col-span-8">
        <div
            class="card col-span-12 mt-12 bg-gradient-to-r from-blue-500 to-blue-600 p-5 sm:col-span-8 sm:mt-0 sm:flex-row h-full"
        >
            <div class="flex justify-center lg:float-right">
                <img
                    class="mt-4 h-48 lg:h-72"
                    src="{{ asset('images/bus.png') }}"
                    alt="image"
                />
            </div>
            <div
                class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left"
            >
                <h3 class="text-xl">
                    Good morning, <span class="font-semibold">{{ Auth::user()->name }}</span>

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Student
                        </span>
                </h3>
                <p class="mt-2 leading-relaxed">Have a nice day at college</p>
                <p>System : <span class="font-semibold">UP</span></p>

                <a href="{{ route('student.semesters') }}">
                <button
                    class="btn px-3 py-2 rounded-lg mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                >
                    Semesters
                </button>
                </a>


                <div class="mt-6">
                    <div class="flex justify-between">
                        <div class="items-center">

                            <div class="flex">
                                <svg
                                    class="h-6 w-6 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    ></path>
                                </svg>
                                <p class="text-white ml-2">Bus Routes</p>
                            </div>
                            <div class="flex flex-wrap mt-3">
                                @forelse(auth()->user()->busBoardingPoint->bus->boardingPoints as $busBoardingPoint)
                                    <p class="text-white ml-2">{{ $busBoardingPoint->place}}</p>
                                    @if (!$loop->last)
                                        <p class="text-white ml-2">-></p>
                                    @endif
                                @empty
                                    <p class="text-white ml-2">Not Assigned</p>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- End --}}

    {{-- Start --}}
    <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4">
        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6"
        >
            <div
                class="rounded-lg bg-info/10 px-4 pb-5 dark:bg-navy-800 sm:px-5"
            >
                <div class="flex items-center justify-between py-3">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Profile
                    </h2>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <div class="avatar h-16 w-16">
                            <img
                                class="rounded-full"
                                src="{{ Auth::user()->profile_photo_url }}"
                                alt="image"
                            />
                        </div>
                        <div>
                            <p>Today</p>
                            <p
                                class="text-xl font-medium text-slate-700 dark:text-navy-100"
                            >
                                {{ now()->format('H:i A') }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <h3
                            class="text-lg font-medium text-slate-700 dark:text-navy-100"
                        >
                            {{ Auth::user()->name }}
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                    <div class="space-y-3 text-xs+">
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Current Semester
                            </p>
                            @if (Auth::user()->student->currentSemester)
                                <p class="text-right">{{ Auth::user()->student->currentSemester->semester->name }}</p>
                            @else
                                <p class="text-right">Not Assigned</p>
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Last Login
                            </p>
                            <p class="text-right">
                                {{ Auth::user()->updated_at->format('d-m-Y') }}
                            </p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Registered Bus
                            </p>
                            <p class="text-right">
                                @if (Auth::user()->busBoardingPoint)
                                    {{ Auth::user()->busBoardingPoint->bus->name }}
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Last Check IN / Check Out
                            </p>
                            <p class="text-right">
                                @if (Auth::user()->accessLogs->count() > 0)
                                    {{ Auth::user()->accessLogs->last()->created_at->format('d-m-Y') }}
                                    <br>
                                    {{ Auth::user()->accessLogs->last()->created_at->format('H:i A') }}
                                @else
                                    Not Available
                                @endif
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Boarding Point
                            </p>
                            <p class="text-right">
                                @if (Auth::user()->busBoardingPoint)
                                    {{ Auth::user()->busBoardingPoint->boardingPoint->place }}
                                @else
                                    Not Assigned
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
</div>


<div class="grid grid-cols-12 gap-4">
    {{-- Start --}}

    @livewire('student.realtime-updates')

    {{-- End --}}

    {{-- Start --}}

    {{-- Parents Column --}}
    {{-- Start --}}
    <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4 border border-gray-200 p-4">


        <!-- Card -->
        <div class="bg-white border border-gray-300 rounded-lg p-5">
            @if (Auth::user()->student->currentSemester && Auth::user()->student->currentSemester->fees)
            <div class="flex items-center gap-x-4 mb-3">
                <div class="flex-shrink-0">
                    <h3 class="block text-lg font-semibold text-gray-800 ">
                        Fees Status : @if (Auth::user()->student->currentSemester->fees->remaining_amount > 0)
                            <span class="text-red-600">Due</span>
                        @else
                            <span class="text-green-600">Paid</span>
                        @endif
                    </h3>
                </div>
            </div>
                <p class="text-gray-600 text-sm pb-3">
                    Due Amount : Rs <span class="text-red-700 font-semibold">{{ Auth::user()->student->currentSemester->fees->remaining_amount }}</span> / Rs <span class="text-green-700 font-semibold">{{ Auth::user()->student->currentSemester->fees->due_amount }}</span> <br><br>
                    <span class="text-gray-800">Please do verify it with college office if you have any further queries.</span><br><br>

                    <a href="{{ route('student.semesters') }}" class="text-blue-600">View Details</a>
                </p>
            @else
            <div class="flex items-center gap-x-4 mb-3">
                <div class="flex-shrink-0">
                    <h3 class="block text-lg font-semibold text-gray-800 ">
                        Fees Status : <span class="text-red-600">Not Generated</span>
                    </h3>
                </div>
            </div>
                <p class="text-gray-600 text-sm pb-3">
                    Fees for the current semester is not generated yet. Please do contact college office for further details.
                </p>
            @endif
        </div>
        <!-- End Card -->

        <div class="mt-6 px-6 text-xl text-left font-semibold text-gray-600 mb-8">
            Parents
        </div>
    @foreach (Auth::user()->guardians as $parent)
        <!-- Card -->
        <a class="group flex flex-col bg-white border rounded-lg hover:shadow-md transition" href="#">
            <div class="px-4 py-3 ">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="size-[38px] rounded-full" src="{{ $parent->user->profile_photo_url }}" alt="Image Description">
                        <div class="ms-3">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-700">
                                {{ $parent->user->name }}
                            </h3>
                            <p class="text-xs text-gray-600">
                                {{ $parent->pivot->relationship }}
                            </p>
                        </div>
                    </div>
                    <div class="ps-3">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->
    @endforeach
    </div>
    {{-- Stop --}}

    {{-- Start --}}
    <div class="mt-4 col-span-12 lg:col-span-4 xl:col-span-4 mx-auto">
        <div class="text-xl text-center font-semibold text-gray-600 mb-8">
            Bus Pass Details
        </div>
        <div
            class="swiper h-40 w-72 mx-auto justify-center"
        >
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide relative  flex h-full flex-col overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-5"
                >
                    <div class="grow mb-2">
                        <img
                            class="mt-1 h-8 rounded-full border-2 border-white"
                            src="{{ Auth::user()->profile_photo_url }}"
                            alt="image"
                        />
                        <p class="-mt-6 text-white float-right text-xs font-medium">Bus No : {{ Auth::user()->busBoardingPoint->bus->bus_no }}</p>
                    </div>
                    <div class="text-white">
                        <p class="text-lg font-semibold tracking-wide">{{ Auth::user()->name }}</p>
                        <p class="mt-1 text-xs font-medium"> {{ Auth::user()->busBoardingPoint->boardingPoint->place }}</p>
                        <p class="mt-1 text-xs font-medium">**** **** **** 8945</p>

                        <p class="-mt-3 text-white float-right text-xs font-bold">CBMS</p>
                    </div>
                    <div
                        class="absolute top-0 right-0 -m-3 h-24 w-24 rounded-full bg-white/20"
                    ></div>
                </div>
            </div>
        </div>
        <div
            class="swiper h-40 w-72 mx-auto justify-center my-4"
        >
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide relative  flex h-full flex-col overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-5"
                >
                    <div class="grow mb-2">

                    </div>
                    <div class="text-white">
                        <p class="-mt-3 text-sm font-semibold tracking-wide">Contact Details</p>
                        <p class="mt-2 text-xs font-medium"> {{ Auth::user()->email }}</p>
                        <p class="mt-1 text-xs font-medium"> {{ Auth::user()->phone }}</p>

                        <p class="mt-5 text-[7px] font-medium">*To be presented when boarding the bus</p>

                        <p class="-mt-2 text-white float-right text-xs font-bold">CBMS</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End --}}
