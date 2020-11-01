<div x-data="{ modaledit: false, modaldelete: false }">
    <div class="lg:flex lg:items-center lg:justify-between bg-white shadow rounded-lg p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold flex flex-wrap justify-between lg:justify-start items-center">
                Dispatch #{{$dispatch->reference_number}}
                <span class="text-sm {{$status_bg}} {{$status_color}} px-2 py-1 rounded lg:ml-2 truncate">
                    {{$status_name}}
                </span>
            </h2>
            <div class="mt-1 flex justify-between sm:mt-0 sm:flex-row sm:flex-wrap sm:justify-start">
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg class="flex-shrink-0 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{$carbon::parse($dispatch->dispatch_date)->format('M d, Y')}}
                </div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg class="flex-shrink-0 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ number_format($dispatch->estimated_miles) }} est miles
                </div>

            </div>
        </div>
        <div class="mt-5 flex justify-between sm:justify-end sm:mt-0 lg:ml-4">
            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                <button type="button" class="relative inline-flex items-center px-4 py-2 rounded border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" @click="modaledit = true">
                    Edit Dispatch
                </button>
            </span>
            <span class="sm:ml-3 shadow-sm rounded-md">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out" wire:click.prevent="complete">
                    Complete
                </button>
            </span>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden rounded-lg mt-8">
        <div class="bg-white px-4 py-3 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Stops
                    </h3>
                </div>
                <div class="ml-4 mt-2 flex-shrink-0">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="button" class="relative inline-flex items-center px-4 py-2 rounded border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Edit Stops
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <ul>
            @foreach($dispatch->stops as $index => $stop)
            <li class="@error('stop_' . $index) animate-pulse bg-red-100 @enderror border-b border-b-gray-200 last:border-b-0" v-for="item in items">
                <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex justify-between items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex justify-between items-center w-full">
                            <div class="leading-5 font-semibold text-indigo-600 truncate">
                                {{$stop->warehouse->name}}
                                @if(count($stop->items) == 0)
                                <div class="text-xs text-yellow-500 flex items-center">
                                    <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Needs Billing Data
                                </div>
                                @endif
                            </div>
                            <div class="leading-5 text-green-500 font-semibold mr-4">
                                ${{number_format($stop->grossPay(), 2)}}
                            </div>
                        </div>
                        <div>
                            <!-- Heroicon name: chevron-right -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="modaledit" style="display: none">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75" x-on:click.self="modaledit = false"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="hidden sm:block absolute top-0 right-0 pt-3 pr-2">
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150" aria-label="Close" @click="modaledit = false">
                        <!-- Heroicon name: x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Reference Number
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" wire:model.lazy="reference_number">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Dispatch Date
                            </label>
                            <input type="date" id="company_website" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="9896636" wire:model.lazy="dispatch_date">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                Estimated Miles
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" wire:model.lazy="estimated_miles">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                State
                            </label>
                            <select class="appearance-none form-select block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" wire:model.lazy="status_id">
                                @foreach($statuses as $index => $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/3 px-3 md:mb-0 mb-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                Delete
                            </label>
                            <button class="appearance-none block w-full bg-red-600 text-white border border-red-500 rounded-md py-3 px-4 leading-tight" @click="modaldelete = true">
                                Delete<span class="md:hidden">&nbsp;Dispatch</span>
                            </button>
                        </div>
                        <div class="w-full px-3 md:hidden">
                            <button type="button" class="appearance-none block w-full bg-white text-gray-700 border border-gray-300 rounded-md py-3 px-4 leading-tight" @click="modaledit = false">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="modaldelete" style="display: none">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0" @click.away="modaledit = true">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75" x-on:click.self="modaldelete = false"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Delete Dispatch #{{$dispatch->reference_number}}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">
                                Are you sure you want to delete this dispatch? All of it's data will be permanently removed from our servers forever. This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
                    <span class="flex w-full rounded-md shadow-sm sm:w-auto">
                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click.prevent="delete">
                            Delete
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" @click="modaldelete = false">
                            Cancel
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>