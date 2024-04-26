
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Access Logs') }}
        </h2>
    </x-slot>

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
                                                    {{ $accessLogs->total() }}
                                                </span> results
                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">

                                                <a href="{{ $accessLogs->previousPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                                    Prev
                                                </a>

                                                <a href="{{ $accessLogs->nextPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
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
                    <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4 border border-gray-200 rounded-xl shadow-sm overflow-hidden bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
                        <div
                            class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6 bg-info/10 px-4 pb-5"
                        >
                            <div
                                class="rounded-lg bg-info/10 px-4 pb-5 sm:px-5"
                            >
                                <div class="flex items-center justify-between py-3">
                                    <h2
                                        class="font-medium tracking-wide"
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
                                                class="text-xl font-medium"
                                            >
                                                11:00
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <h3
                                            class="text-lg font-medium"
                                        >
                                            {{ Auth::user()->name }}

                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Staff
                                    </span>
                                        </h3>
                                        <p class="text-xs text-navy-300">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                    <div class="space-y-3 text-xs+">
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Current Semester
                                            </p>
                                            <p class="text-right">
                                                @if(isset(Auth::user()->staff->currentSemester->semester->name))
                                                    {{ Auth::user()->staff->currentSemester->semester->name }}
                                                @else
                                                    Not Assigned
                                                @endif
                                            </p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                Last Login
                                            </p>
                                            <p class="text-right">{{ now()->format('d-m-Y') }}</p>
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
                                                No: of Students
                                            </p>
                                            <p class="text-right">21</p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p class="font-medium">
                                                No: of Staffs
                                            </p>
                                            <p class="text-right">2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End --}}

                </div>
                <!-- End Table Section -->
            </div>
        </div>
    </div>
</x-app-layout>
