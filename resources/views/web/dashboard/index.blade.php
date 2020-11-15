<div>
    <div class="hidden md:block mb-5">
        <div class="text-2xl font-bold leading-7 text-gray-700 sm:text-3xl sm:leading-9 sm:truncate">
            <h1>Dashboard</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5">
        {{-- stats --}}
        @livewire('components.dashboard.index.stats', ['user' => $user])

        {{-- dispatches --}}
        @livewire('components.dashboard.index.dispatches', ['user' => $user])
    </div>
</div>
