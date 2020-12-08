<div x-data="{ editReferenceNumber: @entangle('editReferenceNumber'), editDate: @entangle('editDate'), editMiles: @entangle('editMiles') }">
    <div class="space-y-4">
        <div class="text-center">
            <h2 class="text-2xl leading-6 font-semibold text-gray-600">Dispatch #{{ $dispatch->reference_number }}</h2>
            {{-- <p class="mt-1 text-sm leading-5 text-gray-500">{{ $subTitle }}.</p> --}}
        </div>

        @include('layout.alerts')

        <div class="space-y-4">
            <div class="space-y-4">
                {{-- earnings --}}
                <div class="text-center">
                    <p class="text-gray-400 text-xs">Projected income</p>
                    <h1 class="text-4xl text-green-400 font-semibold">$0.00</h1>
                </div>

                {{-- details --}}
                <div class="">
                    <div class="border-t border-b border-gray-200">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-4 space-y-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 items-center">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Reference Number
                                </dt>
                                <dd class="text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="flex space-x-4 items-center" x-show="!editReferenceNumber">
                                        <span class="flex-grow border border-transparent py-2 sm:px-3 text-xl sm:text-sm">{{ $dispatch->reference_number }}</span>
                                        <span class="flex-shrink-0">
                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out" x-on:click="editReferenceNumber = true">
                                                Edit
                                            </button>
                                        </span>
                                    </div>
                                    <div class="flex space-x-4 items-center" x-show="editReferenceNumber" style="display:none;">
                                        <input type="text" id="email" class="block w-full text-sm border-gray-300 rounded-md focus:ring-0" wire:model="newReferenceNumber">
                                        <span class="flex-shrink-0 flex space-x-4">
                                            <button type="button" class="focus:outline-none" x-on:click="editReferenceNumber = true">
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" wire:click="save('reference_number')">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                            <button type="button" class="focus:outline-none" x-on:click="editReferenceNumber = false">
                                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </dd>
                            </div>
                            <div class="py-4 space-y-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 items-center">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Dispatch Date
                                </dt>
                                <dd class="text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="flex space-x-4 items-center" x-show="!editDate">
                                        <span class="flex-grow border border-transparent py-2 sm:px-3 text-base sm:text-sm">{{ $carbon::createFromFormat('Y-m-d', $dispatch->date)->toFormattedDateString() }}</span>
                                        <span class="flex-shrink-0">
                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out" x-on:click="editDate = true">
                                                Edit
                                            </button>
                                        </span>
                                    </div>
                                    <div class="flex space-x-4 items-center" x-show="editDate" style="display:none;">
                                        <input type="date" id="email" class="datepicker block w-full text-sm border-gray-300 rounded-md focus:ring-0" wire:model="newDate">
                                        <span class="flex-shrink-0 flex space-x-4">
                                            <button type="button" class="focus:outline-none" x-on:click="editDate = true">
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" wire:click="save('date')">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                            <button type="button" class="focus:outline-none" x-on:click="editDate = false">
                                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </dd>
                            </div>
                            <div class="py-4 space-y-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 items-center">
                                <dt class="text-sm leading-5 font-medium text-gray-500">
                                    Estimated Miles
                                </dt>
                                <dd class="text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="flex space-x-4 items-center" x-show="!editMiles">
                                        <span class="flex-grow border border-transparent py-2 sm:px-3 text-xl sm:text-sm">{{ $dispatch->miles }}</span>
                                        <span class="flex-shrink-0">
                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out" x-on:click="editMiles = true">
                                                Edit
                                            </button>
                                        </span>
                                    </div>
                                    <div class="flex space-x-4 items-center" x-show="editMiles" style="display:none;">
                                        <input type="text" id="email" class="block w-full text-sm border-gray-300 rounded-md focus:ring-0" wire:model="newMiles">
                                        <span class="flex-shrink-0 flex space-x-4">
                                            <button type="button" class="focus:outline-none" x-on:click="editMiles = true">
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" wire:click="save('miles')">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                            <button type="button" class="focus:outline-none" x-on:click="editMiles = false">
                                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            {{-- stops --}}
            @livewire('components.dashboard.dispatch.view.stops-list', [$dispatch])
        </div>

    </div>
</div>
