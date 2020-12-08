<div>
    <div class="grid grid-cols-2 gap-5 sm:grid-cols-2 md:grid-cols-2" wire:init="loadStats">
        @foreach($stats as $stat)
        <a class="block bg-white overflow-hidden shadow rounded-lg" href="#">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-3 font-medium text-gray-500 truncate">
                        {{ $stat['name'] }}
                    </dt>
                    <dd class="mt-1 text-xl sm:text-2xl md:text-3xl leading-5 md:leading-7 font-semibold text-indigo-500 flex justify-between items-center">
                        ${{ number_format($stat['amount'], 2) }}
                        <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                        </svg>
                    </dd>
                </dl>
            </div>
        </a>
        @endforeach
    </div>

    <div class="w-full" wire:loading="loadStats">
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-2 md:grid-cols-2">
            <div class="bg-white shadow rounded-lg min-w-full">
                <div class="px-4 py-5 sm:p-6 animate-pulse">
                    <div class="h-3 w-16 bg-gray-200 rounded">&nbsp;</div>
                    <div class="mt-1 h-5 md:h-7 w-full bg-gray-200 rounded"></div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg min-w-full">
                <div class="px-4 py-5 sm:p-6 animate-pulse">
                    <div class="h-3 w-16 bg-gray-200 rounded">&nbsp;</div>
                    <div class="mt-1 h-5 w-full bg-gray-200 rounded"></div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg min-w-full">
                <div class="px-4 py-5 sm:p-6 animate-pulse">
                    <div class="h-3 w-16 bg-gray-200 rounded">&nbsp;</div>
                    <div class="mt-1 h-5 w-full bg-gray-200 rounded"></div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg min-w-full">
                <div class="px-4 py-5 sm:p-6 animate-pulse">
                    <div class="h-3 w-16 bg-gray-200 rounded">&nbsp;</div>
                    <div class="mt-1 h-5 w-full bg-gray-200 rounded"></div>
                </div>
            </div>

        </div>
    </div>
</div>
