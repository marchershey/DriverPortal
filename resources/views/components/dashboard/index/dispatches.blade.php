<div>
    <div class="bg-white rounded-lg shadow overflow-hidden" wire:init="loadDispatches">
        <div class="p-4 sm:px-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Dispatches
            </h3>
            <div>
                <span class="shadow-sm rounded-md">
                    <a href="{{ route('dashboard.dispatch.create') }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                        New Dispatch
                    </a>
                </span>
            </div>
        </div>

        <div class="">
            <ul class="divide-y divide-gray-200 border-b border-gray-200">
                @foreach($dispatches as $dispatch)
                <li>
                    <a href="{{ route('dashboard.dispatch.view', $dispatch->id) }}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="inline-flex items-center text-sm leading-5 font-bold text-indigo-500">
                                    <svg class="mr-1.5 ml-0.5 mt-px h-3 w-3 {{ $dispatch->status->text_bg_color }}" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"></circle>
                                    </svg>
                                    #{{$dispatch->reference_number}}
                                </div>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize {{ $dispatch->status->bg_color }} {{ $dispatch->status->text_color }}">
                                        {{ $dispatch->status->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                        <!-- Heroicon name: location-marker -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        @if(count($dispatch->stops) > 0)
                                        <div class="flex flex-wrap gap-1" v-for="item in items">
                                            @foreach($dispatch->stops as $stop)
                                            {{$stop->name}} <span class="last:hidden">-</span>
                                            @endforeach
                                        </div>
                                        @else
                                        <span class="px-2 text-xs bg-yellow-200 text-gray-900 rounded">
                                            No stop data
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    <!-- Heroicon name: calendar -->
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>
                                        <time datetime="{{ $dispatch->date }}">{{ $carbon::createFromFormat('Y-m-d', $dispatch->date)->toFormattedDateString() }} </time>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="w-full" wire:loading wire:target="loadDispatches">
            <ul class="divide-y divide-gray-200 border-b border-gray-200">
                <li>
                    <a href="#" class="animate-pulse block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="h-4 w-16 bg-gray-200 rounded"></div>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <span class="w-12 h-4 bg-gray-200 rounded"></span>
                                </div>
                            </div>
                            <div class="mt-3 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                        <!-- Heroicon name: location-marker -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="h-4 w-40 bg-gray-200 rounded"></div>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    <!-- Heroicon name: calendar -->
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>
                                        <div class="h-4 w-28 bg-gray-200 rounded"></div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>


    </div>
</div>
