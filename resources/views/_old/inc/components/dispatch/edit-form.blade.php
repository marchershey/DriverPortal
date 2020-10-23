<form class="w-full" action="#" wire:submit.prevent="submit">

    @include('inc.layouts.alerts.local')

    <div class="bg-white border border-gray-400 rounded p-4 mb-4">
        <div class="w-full md:w-1/3 px-3 mb-4">
            <label class="block uppercase tracking-wide text-gray-600 text-xs font-bold mb-2 @error('reference_number') text-red-500 @enderror" for="reference_number">
                Reference Number
            </label>
            <input id="reference_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('reference_number') border-red-500 @enderror" type="text" placeholder="9832456" wire:model.lazy="reference_number">
            @error('reference_number')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="w-full md:w-1/3 px-3 mb-4">
            <label class="block uppercase tracking-wide text-gray-600 text-xs font-bold mb-2 @error('estimated_miles') text-red-500 @enderror" for="estimated_miles">
                Estimated Miles
            </label>
            <input id="estimated_miles" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('estimated_miles') border-red-500 @enderror" type="text" placeholder="211" wire:model.lazy="estimated_miles">
            @error('estimated_miles')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="w-full md:w-1/3 px-3 mb-4">
            <label class="block uppercase tracking-wide text-gray-600 text-xs font-bold mb-2 @error('starting_date') text-red-500 @enderror" for="starting_date">
                Starting Date
            </label>
            <input id="starting_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('starting_date') border-red-500 @enderror" type="date" wire:model.lazy="starting_date">
            @error('starting_date')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-2 gap-2">
        <button class="w-full text-white font-bold bg-blue-500 border border-blue-700 rounded px-2 py-1" type="sumbit" wire:click.prevent="update">Update Dispatch</button>
        <a href="/dispatch/{{$reference_number}}" class="w-full text-center text-white font-bold bg-gray-500 border border-gray-600 rounded px-2 py-1" type="sumbit">Cancel</a>
    </div>
</form>