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
                <div class="py-4 space-y-1 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Reference Number
                    </dt>
                    <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow">{{ $dispatch->reference_number }}</span>
                        <span class="flex-shrink-0">
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                Edit
                            </button>
                        </span>
                    </dd>
                </div>
                <div class="py-4 space-y-1 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Date
                    </dt>
                    <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow">{{ $carbon::createFromFormat('Y-m-d', $dispatch->date)->toFormattedDateString() }}</span>
                        <span class="flex-shrink-0">
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                Edit
                            </button>
                        </span>
                    </dd>
                </div>
                <div class="py-4 space-y-1 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Estimated Miles
                    </dt>
                    <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow">{{ $dispatch->miles }}</span>
                        <span class="flex-shrink-0">
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                Edit
                            </button>
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- stops --}}
    <div class="">
        <nav>
            <ul class="overflow-hidden">

                @foreach($dispatch->stops as $stop)
                <li class="relative pb-10">
                    <div class="-ml-px absolute mt-0.5 top-4 left-5 w-0.5 h-full bg-indigo-400"></div>
                    <a href="#" class="relative flex items-center space-x-4 group focus:outline-none">
                        <div class="h-10 flex items-center">
                            <span class="relative z-10 w-10 h-10 flex items-center justify-center bg-white group-hover:bg-indigo-500 border-2 border-indigo-400 rounded-full group-hover:border-indigo-500 group-focus:border-indigo-500 transition ease-in-out duration-150">
                                <svg class="w-6 h-6 text-indigo-400 group-hover:text-white transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <div class="">
                                <h3 class="text-sm leading-4 font-semibold uppercase tracking-wide text-gray-500 group-hover:text-indigo-500 transition ease-in-out duration-150">{{ $stop->name }}</h3>
                                <p class="text-xs text-gray-400">Estimated income: $0.00</p>
                            </div>

                            <div class="">
                                <span class="text-green-400 font-semibold">$0.00</span>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach

                <li class="relative">
                    <a href="#" class="relative flex items-center space-x-4 group focus:outline-none">
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
            </ul>
        </nav>
    </div>
</div>




{{-- <div class="space-y-4">
    <div class="text-center">
        <p class="text-gray-400 text-xs">Projected income</p>
        <h1 class="text-4xl text-green-500 font-semibold">$0.00</h1>
    </div>

    <div>
        <dl class="divide-y divide-gray-200 space-y-1 border-b border-t border-gray-200">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 py-2">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Reference Number
                </dt>
                <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ $dispatch->reference_number }}</span>
<span class="flex-shrink-0">
    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
        Update
    </button>
</span>
</dd>
</div>
<div class="sm:grid sm:grid-cols-3 sm:gap-4 py-2">
    <dt class="text-sm leading-5 font-medium text-gray-500">
        Date
    </dt>
    <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
        <span class="flex-grow">{{ $carbon::createFromFormat('Y-m-d', $dispatch->date)->toFormattedDateString() }}</span>
        <span class="flex-shrink-0">
            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                Update
            </button>
        </span>
    </dd>
</div>
<div class="sm:grid sm:grid-cols-3 sm:gap-4 py-2">
    <dt class="text-sm leading-5 font-medium text-gray-500">
        Reference Number
    </dt>
    <dd class="flex space-x-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
        <span class="flex-grow"> Margot Foster</span>
        <span class="flex-shrink-0">
            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                Update
            </button>
        </span>
    </dd>
</div>
</dl>
</div>

<div>
    <ul class="overflow-hidden">
        <li class="relative pb-10">
            <!-- Complete Step -->
            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-indigo-600"></div>
            <a href="#" class="relative flex items-start space-x-4 group focus:outline-none">
                <div class="h-9 flex items-center">
                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800 group-focus:bg-indigo-800 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 text-white" x-description="Heroicon name: check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-xs leading-4 font-semibold uppercase tracking-wide">Create account</h3>
                    <p class="text-sm leading-5 text-gray-500">Vitae sed mi luctus laoreet.</p>
                </div>
            </a>
        </li>

        <li class="relative pb-10">

            <!-- Current Step -->
            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
            <div class="relative flex items-start space-x-4 group focus:outline-none">
                <div class="h-9 flex items-center">
                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-indigo-600 rounded-full">
                        <span class="h-2.5 w-2.5 bg-indigo-600 rounded-full"></span>
                    </span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-xs leading-4 font-semibold uppercase tracking-wide text-indigo-600">Profile information</h3>
                    <p class="text-sm leading-5 text-gray-500">Cursus semper viverra facilisis et et some more.</p>
                </div>
            </div>
        </li>

        <li class="relative pb-10">


            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
            <a href="#" class="relative flex items-start space-x-4 group focus:outline-none">
                <div class="h-9 flex items-center">
                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400 group-focus:border-gray-400 transition ease-in-out duration-150">
                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300 group-focus:bg-gray-300 transition ease-in-out duration-150"></span>
                    </span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-xs leading-4 font-semibold uppercase tracking-wide text-gray-500">Business information</h3>
                    <p class="text-sm leading-5 text-gray-500">Penatibus eu quis ante.</p>
                </div>
            </a>
        </li>

        <li class="relative pb-10">


            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
            <a href="#" class="relative flex items-start space-x-4 group focus:outline-none">
                <div class="h-9 flex items-center">
                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400 group-focus:border-gray-400 transition ease-in-out duration-150">
                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300 group-focus:bg-gray-300 transition ease-in-out duration-150"></span>
                    </span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-xs leading-4 font-semibold uppercase tracking-wide text-gray-500">Theme</h3>
                    <p class="text-sm leading-5 text-gray-500">Faucibus nec enim leo et.</p>
                </div>
            </a>
        </li>

        <li class="relative ">

            <a href="#" class="relative flex items-start space-x-4 group focus:outline-none">
                <div class="h-9 flex items-center">
                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400 group-focus:border-gray-400 transition ease-in-out duration-150">
                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300 group-focus:bg-gray-300 transition ease-in-out duration-150"></span>
                    </span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-xs leading-4 font-semibold uppercase tracking-wide text-gray-500">Preview</h3>
                    <p class="text-sm leading-5 text-gray-500">Iusto et officia maiores porro ad non quas.</p>
                </div>
            </a>
        </li>

    </ul>
</div>



</div> --}}
