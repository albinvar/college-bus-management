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

                <button
                    class="btn px-3 py-2 rounded-lg mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                >
                    View Schedule
                </button>

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
                                11:00
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
                            <p class="text-right">{{ Auth::user()->student->currentSemester->semester->name }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Last Login
                            </p>
                            <p class="text-right">{{ now()->format('d-m-Y') }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Registered Bus
                            </p>
                            <p class="text-right">Bus 16</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Last Check IN / Check Out
                            </p>
                            <p class="text-right">25 May 2021</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Boarding Point
                            </p>
                            <p class="text-right">Karukachal</p>
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
    <div class="pt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4">
        <div class="px-6 text-xl text-left font-semibold text-gray-600 mb-8">
            Parents
        </div>
    @foreach (Auth::user()->guardians as $parent)
        <!-- Card -->
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" href="#">
            <div class="px-4 py-3 ">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="size-[38px] rounded-full" src="{{ $parent->user->profile_photo_url }}" alt="Image Description">
                        <div class="ms-3">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-700">
                                {{ $parent->user->name }}
                            </h3>
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
