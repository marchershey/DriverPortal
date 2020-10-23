<form class="w-full" action="#" wire:submit.prevent="submit">

    @include('inc.layouts.alerts.local')

    <div class="bg-white border border-gray-400 rounded p-4 mb-4">
        <h1 class="font-bold text-gray-700 text-lg px-3 mb-4">Dispatch</h1>
        <div class="w-full px-3 mb-4">
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
        <div class="w-full px-3 mb-4">
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
        <div class="w-full  px-3 mb-4">
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

    <div class="bg-white border border-gray-400 rounded p-4 mb-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg px-3 mb-4">Stops</h1>
        </div>
        <div class="w-full md:w-1/3 px-3">
            @foreach($stops as $index => $stop)
            <div class="mb-4">
                <div class="flex justify-between">
                    <label class="block uppercase tracking-wide text-gray-600 text-xs font-bold mb-2 @error('stops.'.$index.'.warehouse') text-red-500 @enderror">
                        Stop #{{ $index + 1 }}
                    </label>
                    @if($index != 0)
                    <button type="button" class="uppercase text-red-500 text-xs font-bold mb-2" wire:click.prevent="removeStop({{$index}})">Delete</button>
                    @endif
                </div>
                <div class="relative">
                    <select name="stops[{{$index}}][warehouse]" wire:model.lazy="stops.{{ $index }}.warehouse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('stops.'.$index.'.warehouse') border-red-500 @enderror">
                        <option value="">Select a warehouse...</option>
                        @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                @error('stops.'.$index.'.warehouse')
                <div class="text-xs text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @endforeach
        </div>
        <div class="px-3">
            @if(count($stops) < 10) <button type="button" class="font-semibold text-sm bg-gray-200 border border-gray-400 w-full rounded p-1" wire:click.prevent="addStop">+ Add Additional Stop</button> @endif
        </div>
    </div>

    <div class="">
        <button class="w-full bg-blue-500 border border-blue-700 text-blue-100 text-lg font-bold p-2 rounded" type="sumbit">Create Dispatch</button>
    </div>
</form>