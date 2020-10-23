<div>
    <div class="bg-white border border-gray-400 rounded px-4 py-2 mb-4 -mt-2">
        <div class="flex justify-between">
            <div class="uppercase text-gray-600 text-sm font-bold">
                Reference Number
            </div>
            <div class="font-mono font-semibold text-blue-600 text-sm">
                {{ $reference_number }}
            </div>
        </div>
        <div class="flex justify-between mb-2">
            <div class="uppercase text-gray-600 text-sm font-bold">
                Start Date
            </div>
            <div class="font-mono font-semibold text-blue-600 text-sm">
                {{ date('m/d/Y', strtotime($starting_date)) }}
            </div>
        </div>
        <hr class="mb-2">
        <div class="flex justify-between mb-2">
            <div class="uppercase text-gray-600 font-bold">
                Gross Pay
            </div>
            <div class="font-mono font-semibold text-green-600 text-lg">
                ${{number_format($dispatch->grossPay(), 2)}}
            </div>
        </div>
        <div class="flex justify-between">
            <div class="uppercase text-gray-600 text-sm font-bold">
                Estimated Miles <span class="text-xs text-gray-500 lowercase">( {{$estimated_miles}} x ${{$rates['mileage']}} )</span>
            </div>
            <div class="font-mono font-semibold text-blue-600 text-sm">
                ${{number_format(($estimated_miles * $rates['mileage']), 2)}}
            </div>
        </div>
        @if(count($stops) > 1)
        <div class="flex justify-between">
            <div class="uppercase text-gray-600 text-sm font-bold">
                Stop Pay <span class="text-xs text-gray-500 lowercase">( {{count($stops) - 1}} x ${{$rates['stop_pay']}} )</span>
            </div>
            <div class="font-mono font-semibold text-blue-600 text-sm">
                ${{ number_format(((count($stops) - 1) * $rates['stop_pay']), 2) }}
            </div>
        </div>
        @endif
    </div>

    <div class="grid grid-cols-3 gap-2 mb-4">
        <a href="./{{$reference_number}}/edit" class="w-full text-center text-white font-bold bg-blue-500 border border border-blue-700 rounded px-2 py-1">Edit</a>
        <button type="button" class="w-full text-white font-bold bg-yellow-500 border border border-yellow-600 rounded px-2 py-1">Verify</button>
        <button type="button" class="w-full text-white font-bold bg-green-500 border border border-green-700 rounded px-2 py-1">Complete</button>
    </div>

    @foreach($stops as $index => $stop)
    <a href="./{{$dispatch->reference_number}}/{{ $stop->id }}" class="">
        <div class="block bg-white border border-gray-400 rounded px-4 py-2 mb-4">
            <div class="flex justify-between items-center font-bold mb-4">
                <div>
                    <h1 class="text-gray-700 text-lg">Stop #{{ $index + 1 }}</h1>
                    <p class="text-gray-500 text-sm">{{$stop->warehouse->name}}</p>
                </div>
                <div class="text-lg font-mono font-semibold text-green-600">
                    ${{number_format($stop->grossPay(), 2)}}
                </div>
            </div>

            @if(count($stop->items) > 0)
            @foreach($stop->items as $item)
            <div class="flex justify-between text-gray-600 text-sm mb-1">
                <div class="uppercase font-bold">
                    {{$item->billable_items->name}} <span class="text-xs text-gray-500 lowercase">( {{$item->quantity}} x ${{$rates[$item->billable_items->rate_code]}} )</span>
                </div>
                <div class="font-mono font-semibold">
                    ${{number_format(($item->quantity * $rates[$item->billable_items->rate_code]), 2)}}
                </div>
            </div>
            @endforeach
            @else
            <div class="w-full bg-yellow-300 text-yellow-900 font-semibold text-center text-xs rounded py-1">
                This stop needs data!
            </div>
            @endif
        </div>
    </a>
    @endforeach

    <div class="mb-4">
        <button type="button" class="w-full text-white font-bold bg-blue-500 border border border-blue-700 rounded px-2 py-1">Edit Stops</button>
    </div>
</div>