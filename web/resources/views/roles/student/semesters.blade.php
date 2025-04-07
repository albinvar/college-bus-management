<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semesters') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            @foreach ($semesters as $semester)
                <div class="border border-gray-200 rounded-lg shadow-sm p-6 bg-white">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                        <div>
                            <div class="text-lg font-semibold text-gray-900">
                                {{ $semester->semester->name }} ({{ $semester->semester->year }})
                            </div>
                            @if ($semester->is_current == 1)
                                <div class="mt-1 inline-block text-xs bg-green-200 text-green-800 font-semibold rounded-full px-2 py-1">
                                    Current Semester
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 sm:mt-0">
                            @if ($semester->fees && $semester->fees->remaining_amount > 0)
                                <a href="{{ route('pay', ['fee' => $semester->fees->id]) }}"
                                   class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md hover:bg-blue-700 transition">
                                    Pay Fee
                                </a>
                            @elseif($semester->fees)
                                <span class="text-green-600 font-medium">Fee Paid</span>
                            @else
                                <span class="text-red-600 font-medium">Fees Not Generated</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Start Date</p>
                            <p class="text-base text-gray-800">{{ $semester->semester->start_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">End Date</p>
                            <p class="text-base text-gray-800">{{ $semester->semester->end_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Bus Fare</p>
                            <p class="text-base text-gray-800">
                                @if (!$semester->fees)
                                    <span class="text-red-500">Not Generated</span>
                                @else
                                    Rs {{ $semester->fees->due_amount }}
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Fee Status</p>
                            <p class="text-base">
                                @if (!$semester->fees)
                                    <span class="text-red-600 font-medium">Not Generated</span>
                                @else
                                    @if($semester->fees->remaining_amount > 0)
                                        <span class="text-red-600 font-medium">Unpaid</span>
                                    @else
                                        <span class="text-green-600 font-medium">Paid</span>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
