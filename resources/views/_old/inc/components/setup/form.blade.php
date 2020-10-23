<div>
    <hr class="mt-4">
    <div class="mt-4">
        <h1 class="font-bold text-sm text-gray-600">Full Name</h1>
        <p class="font-semibold text-xs text-gray-500">You name is used to personalize your dashboard.</p>
    </div>

    <div class="grid grid-cols-2 gap-2">
        <div>
            <input type="text" placeholder="First Name" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 capitalize focus:outline-none focus:bg-white @error('first_name') border-red-500 @enderror" wire:model="first_name" />
        </div>
        <div>
            <input type="text" placeholder="Last Name" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 capitalize focus:outline-none focus:bg-white @error('last_name') border-red-500 @enderror" wire:model.lazy="last_name" />
        </div>
    </div>

    @error('first_name')
    <p class="text-red-500 text-xs italic">
        {!! $message !!}
    </p>
    @enderror

    @error('last_name')
    <p class="text-red-500 text-xs italic">
        {{ $message }}
    </p>
    @enderror

    <div class="mt-4">
        <h1 class="font-bold text-sm text-gray-600">Hire Date</h1>
        <p class="font-semibold text-xs text-gray-500">Your hire date is needed to give you accurate rates. If you do not know your hire date, you can log into your <a href="https://www.firstfleetinc.com/MyPortal" class="text-primary-lighter">First Fleet Portal</a> and visiting the <span class="font-bold">ManageUserProfile</span> section.</p>
        <input type="date" placeholder="Hire Date" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('hire_date') border-red-500 @enderror" wire:model.lazy="hire_date" value="{{date('Y-m-d')}}">
    </div>

    @error('hire_date')
    <p class="text-red-500 text-xs italic">
        {{ $message }}
    </p>
    @enderror

    <div class="mt-4 w-full">
        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="w-full py-2 px-4 bg-primary font-bold text-white rounded hover:bg-primary-darker focus:outline-none" wire:click.prevent="submit">
                Continue
            </button>
        </div>
    </div>
</div>