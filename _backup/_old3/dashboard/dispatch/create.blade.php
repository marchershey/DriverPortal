<div>
    <!-- Page title & actions -->
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{$pageTitle}}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            {{-- <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                    Share
                </button>
            </span> --}}
            <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                <a href="{{route('dashboard.dispatch.create')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                    New Dispatch
                </a>
            </span>
        </div>
    </div>


    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="">
                    <h3 class="text-lg font-medium leading-6">Dispatch Information</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-600">
                        You are creating a new dispatch. Fill out the information on the form below to get started.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow rounded overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid gap-6">
                            <div>
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700  @error('reference_number') text-red-500 @enderror">
                                    Reference Number
                                </label>
                                <input id="company_website" class="form-input flex-1 block w-full rounded transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-1 @error('reference_number') border-red-500 @enderror" placeholder="9896636" wire:model.lazy="reference_number">
                                <span class="text">This is the reference number, order number, or RID that can be found on your FirstFleet&trade; Mobile App. Alternatively, you can place any kind of reference number here that you would like. This number helps you keep track of this specific dispatch. <strong>This must be unique as it acts as the site-wide identifier.</strong></span>
                            </div>
                            <div>
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 @error('estimated_miles') text-red-500 @enderror">
                                    Estimated Miles
                                </label>
                                <input type="tel" id="company_website" class="form-input flex-1 block w-full rounded transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-1 @error('estimated_miles') border-red-500 @enderror" placeholder="127" wire:model.lazy="estimated_miles">
                                <p class="text">The estimated distance in miles you drive thoughout your entire trip from the time you start until the time you park at the end of your shift. FirstFleet&trade; has estimated this distance and it can be found in the FirstFleet&trade; Mobile App.</p>
                            </div>
                            <div>
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700">
                                    Dispatch Date
                                </label>
                                <input type="date" id="company_website" class="form-input flex-1 block w-full rounded transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-1" placeholder="9896636" wire:model.lazy="dispatch_date">
                                <p class="text">The date that should be given here is ultimately up to you as long as you stay repetitive. Generally, the best date to enter is the day you <strong>end</strong> your trip. This is because in your FirstFleet&trade; Mobile App, the date they display is the day you ended your trip.</p>
                            </div>
                            <div>
                                <label for="statistics_toggle" class="block">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium leading-5 text-gray-700">
                                            Enable Equipment Tracking?
                                            <sup class="inline-flex items-center px-2 rounded-full text-xs font-medium leading-4 bg-blue-200 text-blue-600">New!</sup>
                                        </span>
                                        <div class="">
                                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in" x-on:click="equipment = !equipment" @keydown.space.prevent="equipment = !equipment">
                                                <input id="statistics_toggle" type="checkbox" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer transform transition ease-in-out duration-200 translate-x-5" x-bind:class="{ 'translate-x-5 border-primary': equipment, 'translate-x-0': !equipment }" wire:model="equipment_tracking" />
                                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full cursor-pointer transition ease-in-out duration-200" x-bind:class="{ 'bg-gray-300': !equipment, 'bg-primary': equipment }"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text">Have I pulled this trailer before? How many miles have I put on this trailer? I wonder how many different trucks I've used. All these questions can be answered if you enable Equipment Tracking! <a href="#" class="link">Learn more</a></p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="">
                    <h3 class="text-lg font-medium leading-6">Stops</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-600">
                        On this panel, you need to select each warehouse you are going to visit (or visited) on this dispatch.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow rounded overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid gap-6">
                            @foreach($stops as $index => $stop)
                            <div>
                                <div class="flex justify-between">
                                    <label for="warehouses" class="block text-sm leading-5 font-medium text-gray-700">Stop #{{$index + 1}}</label>
                                    @if($index > 0)
                                    <span class="block text-sm leading-5 font-medium text-red-500 cursor-pointer" wire:click.prevent="removeStop({{$index}})">Delete</span>
                                    @endif
                                </div>
                                <select name="stops[{{$index}}][warehouse]" wire:model.lazy="stops.{{ $index }}.warehouse" class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 @error('stops.'.$index.'.warehouse') border-red-500 @enderror">
                                    <option value="">Select Warehouse...</option>
                                    @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-md text-gray-700 bg-gray-200 border border-gray-300 hover:bg-gray-300 focus:outline-none transition ease-in-out duration-150" wire:click="addStop()">
                                    <svg viewBox="0 0 16 16" class="-ml-1 mr-1 h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    Add additional stop
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="flex px-4 py-3 bg-gray-50 sm:px-6">
                        <div class="w-full text-right rounded">
                            <div class="" x-bind:class="{ 'hidden': !equipment }">
                                <svg class="animate-bounce w-6 h-6 mx-auto text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </div>
                            <div class="" x-bind:class="{ 'hidden': equipment }">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-primary hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" wire:click="submit">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10" x-show="equipment">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="">
                    <h3 class="text-lg font-medium leading-6">Equipment Data</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-600">
                        Equipment tracking enables you to gather data on all the equipment you've used since using {{ config('app.name') }}.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow rounded overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid gap-6">
                            <div class="flex items-center bg-blue-100 text-xs p-4">
                                <div class="flex-shrink-0 mr-3">
                                    <svg class="h-5 w-5 text-blue-400" x-description="Heroicon name: information-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="w-full text-blue-800">
                                    If you use the same truck every day, you can assign a specific truck to yourself in your <a href="#" class="text-blue-600">Settings</a>.
                                </div>
                            </div>

                            <div>
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700">
                                    Truck Number
                                </label>
                                <input id="company_website" class="form-input flex-1 block w-full rounded transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-1" placeholder="9896636">
                                <span class="text">Enter the truck number of the truck you are using today.</span>
                            </div>
                            <div>
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700">
                                    Trailer Number
                                </label>
                                <input id="company_website" class="form-input flex-1 block w-full rounded transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-1" placeholder="127">
                                <p class="text">Enter the trailer number of the trailer you are using today.</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-primary hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Continue
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>