{{-- Start --}}
    <div class="col-span-12 lg:col-span-4 xl:col-span-4">
        <!-- component -->
        <div class="p-4 mx-4 w-full mx-auto pt-20 flow-root">
            <ul role="list" class="-mb-8">
                @forelse($updates as $notification)
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 ear
                                        0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                    </svg>
                                </span>
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                    <div>
                                        <p class="text-sm text-gray-500">packing at <a href="#" class="font-medium text-gray-900">France</a></p>
                                    </div>
                                    <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                        <time datetime="2020-09-20">Sep 20</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <div class="relative pb-8">
                            <div class="relative flex space-x-3">
                                <div>
                                <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5.586l-2.293-2.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L11 9.586V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                    <div>
                                        <p class="text-sm text-gray-500">No Notifications</p>
                                    </div>
                                    <div class="whitespace nowrap text-right text-sm text-gray-500">
                                        <time datetime="{{ now() }}"> {{ now()->diffForHumans() }} </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
{{-- End --}}
