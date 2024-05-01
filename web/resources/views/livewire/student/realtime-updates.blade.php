{{-- Start --}}
<div class="col-span-12 lg:col-span-4 xl:col-span-4">
 <div class="flex items-center justify-between pt-4 px-4">
        <h2 class="font-semibold text-gray-800">Realtime Updates</h2>
        <button type="button" class="text-sm text-gray-500 hover:text-gray-600">View all</button>
    </div>

 <!-- component -->
        <div class="p-4 mx-4 w-full mx-auto flow-root">
            <!-- Timeline -->
<div>
@forelse($updates as $update)
  <!-- Item -->
  <div class="flex gap-x-3">
    <!-- Left Content -->
    <div class="w-16 text-end">
      <span class="text-xs text-gray-500">
        {{ $update->created_at->diffForHumans() }}
      </span>
    </div>
    <!-- End Left Content -->

      @if ($loop->first)
          <!-- Icon -->
          <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-green-200">
              <div class="relative z-10 size-7 flex justify-center items-center">
                  <div class="size-2 rounded-full bg-green-400 animate-ping"></div>
              </div>
          </div>
          <!-- End Icon -->
      @else
    <!-- Icon -->
    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
      <div class="relative z-10 size-7 flex justify-center items-center">
        <div class="size-2 rounded-full bg-gray-400"></div>
      </div>
    </div>
    <!-- End Icon -->
      @endif

    <!-- Right Content -->
    <div class="grow pt-0.5 pb-8">
      <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
        <svg class="flex-shrink-0 size-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
          <polyline points="14 2 14 8 20 8"></polyline>
          <line x1="16" x2="8" y1="13" y2="13"></line>
          <line x1="16" x2="8" y1="17" y2="17"></line>
          <line x1="10" x2="8" y1="9" y2="9"></line>
        </svg>
          {{ $update->custom_message }}
      </h3>
      <p class="mt-1 text-sm text-gray-600">
        {{ $update->message }}
      </p>
        <button type="button" class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
            <img class="flex-shrink-0 size-4 rounded-full" src="{{ $update->user->profile_photo_url }}" alt="Image Description">
            {{ $update->user->name }}
        </button>
    </div>
    <!-- End Right Content -->
  </div>
  <!-- End Item -->
    @empty
        <!-- Item -->
        <div class="flex gap-x-3">
            <!-- Left Content -->
            <div class="w-16 text-end">
      <span class="text-xs text-gray-500">
            {{ now()->diffForHumans() }}
      </span>
            </div>
            <!-- End Left Content -->

            <!-- Icon -->
            <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                <div class="relative z-10 size-7 flex justify-center items-center">
                    <div class="size-2 rounded-full bg-gray-400"></div>
                </div>
            </div>
            <!-- End Icon -->

            <!-- Right Content -->
            <div class="grow pt-0.5 pb-8">
                <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
                    <svg class="flex-shrink-0 size-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" x2="8" y1="13" y2="13"></line>
                        <line x1="16" x2="8" y1="17" y2="17"></line>
                        <line x1="10" x2="8" y1="9" y2="9"></line>
                    </svg>
                    No updates yet
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    All updates will appear here
                </p>
                <button type="button" class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <img class="flex-shrink-0 size-4 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="Image Description">
                    {{ auth()->user()->name }}
                </button>
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Item -->

    @endforelse
</div>
<!-- End Timeline -->
        </div>
    </div>
{{-- End --}}
