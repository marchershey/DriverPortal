<div class="space-y-4">
    @include('layout.alerts')
    <div class="space-y-4">
        <div class="grid sm:grid-cols-8 gap-6">
            <div class="col-span-4 sm:col-span-3">
                <label for="reference_number" class="block text-sm font-medium leading-5 text-gray-700">Reference Number</label>
                <input id="reference_number" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('reference_number')border-red-500 @enderror" placeholder="Reference Number" wire:model.lazy="reference_number">
            </div>

            <div class="col-span-4 sm:col-span-3">
                <label for="date" class="block text-sm font-medium leading-5 text-gray-700">Dispatch Date</label>
                <input id="date" class="form-input mt-1 block w-full border datepicker border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('date')border-red-500 @enderror" placeholder="" value="{{date('YYYY-mm-d')}}" wire:model.lazy="date">
            </div>

            <div class="col-span-4 sm:col-span-2">
                <label for="miles" class="block text-sm font-medium leading-5 text-gray-700">Estimated Miles</label>
                <input type="number" max="999" id="miles" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('miles')border-red-500 @enderror" placeholder="Miles" wire:model.lazy="miles">
            </div>
        </div>

        <p class="text-xs text-gray-400">
            Please note that the dispatch date should be when the dispatch was completed.
        </p>

        <div class="flex justify-end">
            <span class="inline-flex rounded-md mt-1 sm:text-sm leading-4 font-medium">
                <button type="button" class="inline-flex items-center shadow-sm px-3 py-2 border border-transparent rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150" wire:click="submit" wire:loading.remove="" wire:target="submit">
                    Continue
                </button>
                <div class="px-3 py-1 -mt-px" wire:loading="" wire:target="submit">
                    <svg class="animate-spin h-7 w-7 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </span>
        </div>
    </div>
</div>
