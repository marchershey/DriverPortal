<div>
    @include('inc.layouts.alerts.local')

    <div class="bg-white border border-gray-400 rounded px-4 py-2 mb-4">
        <h1 class="font-bold text-gray-700 text-lg mb-4">Billable Items</h1>

        @foreach($stop_items as $index => $stop_item)
        <div class="flex gap-2">
            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 @error('stop_items.'.$index.'.billable_item_id') text-red-500 @enderror">
                    Item
                </label>
            </div>
            <div class="w-2/6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 @error('stop_items.'.$index.'.quantity') text-red-500 @enderror">
                    Total
                </label>
            </div>
            <div class="">&nbsp;</div>
        </div>

        <div class="flex gap-2 mb-4">
            <div class="w-full">
                <div class="relative">
                    <select name="stop_items[{{$index}}][billable_item_id]" wire:model.lazy="stop_items.{{$index}}.billable_item_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-sm text-gray-700 py-1 px-1 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('stop_items.'.$index.'.billable_item_id') border-red-500 @enderror">
                        <option value="">Select an item...</option>
                        @foreach($billable_items as $billable_item)
                        <option value="{{$billable_item->id}}">{{$billable_item->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-2/6">
                <input name="stop_items[{{$index}}][quantity]" wire:model.lazy="stop_items.{{$index}}.quantity" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-sm text-gray-700 py-1 px-1 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('stop_items.'.$index.'.quantity') border-red-500 @enderror" type="text" placeholder="#">
            </div>
            <div class="">
                <button type="button" class="text-xs bg-red-500 px-2 rounded text-white font-bold py-1" wire:click.prevent="removeStopItem({{$index}})">X</button>
            </div>
        </div>

        @error('stop_items.'.$index.'.*')
        <div class="w-full text-xs text-red-500 font-semibold -mt-4 mb-4">
            {{$message}}
        </div>
        @enderror
        @endforeach

        <div class="mb-2">
            <button type="button" class="w-full text-xs text-grey-500 font-bold bg-gray-200 border border-gray-400 rounded py-1" wire:click.prevent="addStopItem">Add Billable Item</button>
        </div>
    </div>

    <button type="button" class="w-full text-white font-bold bg-blue-500 border border border-blue-700 rounded px-2 py-1" wire:click.prevent="submit">
        Save
    </button>
</div>