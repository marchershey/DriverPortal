<div class="pb-6">
    {{-- Weekly Stats --}}
    <div class="grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow md:grid-cols-3">
        <div>
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-base leading-6 font-normal text-gray-900">
                        Weekly Income
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-primary">
                            $897.00
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                from $621.00
                            </span>
                        </div>
                        <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                            <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">
                                Increased by
                            </span>
                            12%
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="border-t border-gray-200 md:border-0 md:border-l">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-base leading-6 font-normal text-gray-900">
                        Avg. Open Rate
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                            58.16%
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                from 56.14%
                            </span>
                        </div>
                        <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                            <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">
                                Increased by
                            </span>
                            2.02%
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="border-t border-gray-200 md:border-0 md:border-l">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-base leading-6 font-normal text-gray-900">
                        Avg. Click Rate
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                            24.57%
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                from 28.62
                            </span>
                        </div>
                        <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                            <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">
                                Decreased by
                            </span>
                            4.05%
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="px-4 py-3 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-500 tracking-wider shadow mt-6 rounded-t-lg flex justify-between items-center">
        <span class="uppercase">
            Latest Dispatches
        </span>
        <div x-data="{ dispatchMenu: false }" @keydown.escape="dispatchMenu = false" @click.away="dispatchMenu = false" class="relative inline-block text-left">
            <div>
                <button @click="dispatchMenu = !dispatchMenu" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="Options" id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                </button>
            </div>

            <div x-show="dispatchMenu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                <div class="rounded-md bg-white shadow-xs">
                    <div class="py-1 text-xs text-gray-600" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="#" class="block px-4 py-2 text-xs leading-5 hover:bg-gray-100" role="menuitem">View All Dispatches</a>
                        <a href="{{ route('dashboard.dispatch.create') }}" class="block px-4 py-2 text-xs leading-5 hover:bg-gray-100" role="menuitem">Create New Dispatch</a>
                        <div class="border-t"></div>
                        <a href="#" class="block px-4 py-2 text-xs leading-5 hover:bg-gray-100" role="menuitem">Settings </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow overflow-hidden rounded-lg rounded-t-none">
        <ul>
            @if(count($user->dispatches->where('deleted', 0)) > 0)

            @foreach($user->dispatches->sortByDesc('dispatch_date')->where('deleted', 0) as $dispatch)
            <li v-for="item in items" class="border-b last:border-b-0">
                <a href="/dashboard/dispatch/{{$dispatch->id}}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-lg leading-5 font-semibold text-primary truncate py-1">
                                <div class="w-2 h-2 rounded-full {{$dispatch->status->bg_color}} mr-2"></div>
                                #{{$dispatch->reference_number}}
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <span class="px-2 inline-flex leading-5 font-semibold rounded bg-green-100 text-green-500">
                                    ${{$dispatch->grossPay()}}
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <div class="mt-2 flex flex-col items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    <!-- Heroicon name: location-marker -->
                                    @foreach($dispatch->stops as $stop)
                                    <div class="flex w-full">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-1 mr-2">
                                            {{$stop->warehouse->name}}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2 flex items-start text-sm leading-5 text-gray-500 sm:mt-0">
                                <!-- Heroicon name: calendar -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">
                                    <time datetime="{{$dispatch->dispatch_date}}">{{ \Carbon\Carbon::parse($dispatch->dispatch_date)->isoFormat('MMMM Do, YYYY') }}</time>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach

            @else
            <li class="">
                <div class="p-4 sm:px-6 text-center">
                    <div class="mb-8 text-gray-600">
                        <h1 class="text-xl font-semibold mb-3">Let's get started!</h1>
                        <p class="text-gray-500">All of your dispatches will be here, after you create your first one.</p>
                    </div>
                    <div class="mb-4">
                        <a href="{{route('dashboard.dispatch.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create a new dispatch
                        </a>
                    </div>
                </div>
            </li>
            @endif
        </ul>
    </div>


</div>