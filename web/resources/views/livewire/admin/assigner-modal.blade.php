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
                      Semester :
                      @if($student->student->currentSemester)
                          <strong>{{ $student->student->currentSemester->semester->name }}</strong><br>
                      @else
                          <strong>Not assigned</strong><br>
                      @endif
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
                <button
                    wire:click="assign()"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    Start Linking Process
                </button>
            </div>
        </div>
    </div>
</div>

