<div class="" wire:init="loadStops()" x-data="{ addStopModal: @entangle('addStopModal'), viewStopModal: @entangle('viewStopModal') }">
    <div class="space-y-4">
        <div class="pb-5 space-y-2">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Stops
            </h3>
            <p class="max-w-4xl text-sm leading-5 text-gray-500">Add each stop for this dispatch below, along with their corresponding billing data.</p>
        </div>

        <nav>
            <ul class="overflow-hidden">
                <div class="w-full" wire:loading wire:target="loadStops">
                    <li class="relative animate-pulse">
                        <a href="#" class="flex items-center space-x-4 focus:outline-none">
                            <div class="h-10 flex items-center">
                                <span class="relative z-10 w-10 h-10 flex items-center justify-center bg-white border-2 border-gray-200 rounded-full transition ease-in-out duration-150">
                                    <svg class="animate-spin h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <div class="space-y-1 w-full">
                                    <div class="h-5 w-48 bg-gray-200 rounded"></div>
                                    <div class="h-4 w-2/3 bg-gray-200 rounded"></div>
                                </div>

                                <div class="">
                                    <div class="h-5 w-10 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                </div>
                <div class="" wire:loading.remove wire:target="loadStops">
                    @if($stops)
                    @foreach($stops as $index => $stop)
                    <li class="relative pb-10" wire:click.prevent="viewStop({{$index}})" wire:key="stop.{{$stop->id}}">
                        <div class="-ml-px absolute mt-0.5 top-4 left-5 w-0.5 h-full bg-indigo-400"></div>
                        <a href="#" class="flex items-center space-x-4 group focus:outline-none">
                            <div class="h-10 flex items-center">
                                <span class="relative z-10 w-10 h-10 flex items-center justify-center bg-white group-hover:bg-indigo-500 border-2 border-indigo-400 rounded-full group-hover:border-indigo-500 group-focus:border-indigo-500 transition ease-in-out duration-150">
                                    <svg class="w-6 h-6 text-indigo-400 group-hover:text-white transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex justify-between items-center w-full space-x-3">
                                <div class="">
                                    <h3 class="text-sm leading-4 font-semibold uppercase tracking-wide text-gray-500 group-hover:text-indigo-500 transition ease-in-out duration-150">{{ $stop->warehouse->name }}</h3>
                                    <div class="text-xs text-gray-400 truncate-2-lines">
                                        What if I type a really long message here, will it overflow? What if I type a really long message here, will it overflow? What if I type a really long message here, will it overflow? What if I type a really long message here, will it overflow? What if I type a really long message here, will it overflow? What if I type a really long message here, will it overflow?
                                    </div>
                                </div>

                                <div class="">
                                    <span class="text-green-400 font-semibold">$0.00</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    @endif
                    <li class="relative">
                        <a href="#" class="relative flex items-center space-x-4 group focus:outline-none" wire:click="openAddStopModal()">
                            <div class="h-10 flex items-center">
                                <span class="relative z-10 w-10 h-10 flex items-center justify-center bg-white group-hover:bg-indigo-500 border-2 border-indigo-400 rounded-full group-hover:border-indigo-500 group-focus:border-indigo-500 transition ease-in-out duration-150">
                                    <svg class="w-5 h-5 text-indigo-400 group-hover:text-white transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-sm leading-4 font-semibold text-gray-400 group-hover:text-indigo-500 transition ease-in-out duration-150">Add a stop...</h3>
                            </div>
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
    </div>

    {{-- Add Stop Modal --}}
    <div class="fixed z-50 inset-0 overflow-y-auto" style="display:none" x-show="addStopModal" wire:key="addStopModal">
        <div class="flex items-end justify-center h-full pt-4 px-4 pb-20 text-center sm:block">
            <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-black opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-full"></span>​
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-sm w-full sm:p-6" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-on:click.away="$wire.closeAddStopModal()" x-show.transition="addStopModal">
                <div>
                    <div class="text-center">
                        <h3 class="text-xl leading-6 font-semibold text-gray-900">
                            Select a warehouse...
                        </h3>
                        @include('layout.alerts')
                        <div class="mt-4">
                            <select class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:shadow-none focus:outline-none @error('newStop.warehouse')border-red-500 focus:border-red-500 @enderror" wire:model="newStop.warehouse">
                                <option value="">Select a warehouse...</option>
                                @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full rounded-md shadow-sm">
                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5" x-on:click="$wire.saveStop()">
                            Continue
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- View Stop Modal --}}
    @if(isset($selectedStop))
    <div x-show="viewStopModal" wire:key="viewStopModal" class="fixed flex inset-0 z-50 bg-black bg-opacity-75" style="display:none">
        <div class="flex self-center items-end sm:items-center justify-center w-full h-full p-8">
            <div class="flex flex-col overflow-hidden bg-white rounded w-full max-w-md max-h-full" x-on:click.away="$wire.hideViewStopModal()">
                <div class="relative flex-shrink-0 flex items-start justify-between border-b border-gray-200 p-4">
                    <div class="absolute right-4 h-full">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <h1 class="font-semibold text-lg text-center w-full">
                        {{ $selectedStop->warehouse->name }}
                    </h1>
                </div>
                <div class="relative p-4 overflow-y-auto">
                    @include('layout.alerts')
                    {{-- Billing Items --}}
                    @if($selectedStopBillingItems)
                    <div class="space-y-2 mb-4">
                        <div class="grid grid-cols-8 gap-2">
                            <div class="col-span-5">Billing Item</div>
                            <div class="col-span-3">Quantity</div>
                        </div>
                        @foreach($selectedStopBillingItems as $index => $item)
                        <div class="grid grid-cols-8 gap-2">
                            <div class="col-span-5">
                                <select wire:model="selectedStopBillingItems.{{ $index }}.id" name="item[]" type="text" class="form-select w-full transition duration-150 ease-in-out text-xs sm:leading-5 @error('selectedStopBillingItems.{{ $index }}.id') border-red-500 @enderror">
                                    <option value="">Select an option...</option>
                                    @foreach($billingItems as $billingItem)
                                    <option value="{{ $billingItem['id'] }}">{{ $billingItem['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <input wire:model.defer="selectedStopBillingItems.{{ $index }}.quantity" name="quantity[]" type="tel" class="form-input w-full transition duration-150 ease-in-out text-xs sm:leading-5" placeholder="#" onclick="this.select()">
                            </div>
                            <div class="flex items-center justify-center">
                                <button wire:click="removeBillingItem({{ $index }})">
                                    <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- Loading Billing Item --}}
                    <div class="w-full" wire:loading wire:target="addBillingItem">
                        <div class="grid grid-cols-7 gap-4 animate-pulse">
                            <div class="h-8 bg-gray-300 rounded col-span-4"></div>
                            <div class="h-8 bg-gray-300 rounded col-span-2"></div>
                            <div class="h-8 bg-gray-300 rounded"></div>
                        </div>
                    </div>

                    {{-- Options --}}
                    <div class="flex justify-between">
                        <button wire:click="addBillingItem" type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                            + Add Billing Item
                        </button>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 flex items-center justify-between border-t border-gray-200 p-4">
                    <button type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-red-500 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                        Delete Stop
                    </button>
                    <button wire:click="saveBillingItems()" type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- View Stop Modal --}}
    @if($selectedStop == 'test')
    <div x-show="viewStopModal_old" wire:key="viewStopModal_old" class="fixed z-50 inset-0 overflow-hidden" style="display:none">
        <div class="flex items-end justify-center h-full px-4 py-20 text-center sm:block">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-black opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-full"></span>​
            <div class="inline-block max-h-screen max-w-md align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:p-6 space-y-4" wire:key="viewStopModalBody" x-show.transition="viewStopModal" x-on:click.away="$wire.hideViewStopModal()">
                <div class="w-full text-center">
                    <h1 class="font-semibold text-xl">{{ $selectedStop->warehouse->name }}</h1>
                </div>
                <div class="border-b"></div>
                @include('layout.alerts')
                <div class="space-y-4 overflow-y-auto">
                    @if($selectedStopBillingItems)
                    @foreach($selectedStopBillingItems as $index => $item)
                    <div wire:key="billingitem.{{ $index }}" class="grid grid-cols-7 gap-4">
                        <div class="col-span-4">
                            <select wire:model="selectedStopBillingItems.{{ $index }}.id" name="item[]" type="text" class="form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option value="">Select an option...</option>
                                @foreach($billingItems as $billingItem)
                                <option value="{{ $billingItem->id }}">{{ $billingItem->id }} - {{ $billingItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 flex items-center justify-between gap-4">
                            <input wire:model.defer="selectedStopBillingItems.{{ $index }}.quantity" name="quantity[]" type="number" class="form-input w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="#" onclick="this.select()">
                        </div>
                        <div class="flex items-center justify-center">
                            <button wire:click="removeBillingItem({{ $index }})">
                                <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="w-full" wire:loading wire:target="addBillingItem">
                        <div class="grid grid-cols-7 gap-4 animate-pulse">
                            <div class="h-8 bg-gray-300 rounded col-span-4"></div>
                            <div class="h-8 bg-gray-300 rounded col-span-2"></div>
                            <div class="h-8 bg-gray-300 rounded"></div>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <button wire:click="addBillingItem" type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                            + Add Billing Item
                        </button>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-b"></div>
                <div class="flex justify-between">
                    <button type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                        Delete Stop
                    </button>
                    <button wire:click="hideViewStopModal()" type="button" class="text-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:shadow-none active:bg-gray-300 transition ease-in-out duration-150">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
