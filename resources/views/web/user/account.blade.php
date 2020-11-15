<div class="space-y-10" wire:init="loadUserData">
    <div class="space-y-4">
        <div class="">
            <h2 class="text-lg leading-6 font-medium text-gray-900">Your Account</h2>
            <p class="mt-1 text-sm leading-5 text-gray-500">Update your personal information. Please note that changing your hire date will affect your pay rates.</p>
        </div>

        <div class="border-b border-gray-200"></div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                    First name
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="first_name" class="form-input block w-full pr-10 sm:text-sm sm:leading-5 @error('first_name')border-red-500 @enderror" placeholder="First Name" wire:model.lazy="first_name">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="loadUserData, first_name">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
                @error('first_name')
                <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                    Last name
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="last_name" class="form-input block w-full pr-10 sm:text-sm sm:leading-5" placeholder="Last Name" wire:model.lazy="last_name">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="loadUserData, last_name">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                    Email address
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="email" class="form-input block w-full pr-10 sm:text-sm sm:leading-5" placeholder="Email Address" wire:model.lazy="email">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="loadUserData, email">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                    Hire Date
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="date" id="hire_date" class="form-input block w-full pr-10 sm:text-sm sm:leading-5 datepicker" placeholder="Email Address" wire:model.lazy="hire_date" value="{{ $hire_date }}">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="loadUserData, hire_date">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" x-data="{ modalDeactivate: false }">
        <div class="space-y-4">
            <div class="border-b border-gray-200"></div>
            <div class="flex justify-center">
                <div class="flex text-sm leading-5 text-gray-400 sm:mt-0 sm:col-span-2">
                    <button class="px-2 py-1 text-xs" x-on:click="modalDeactivate = true">Deactivate Account</button>
                </div>
            </div>
        </div>

        {{-- Deactivate Account Modal --}}
        <div class="fixed z-10 inset-0 overflow-y-auto" x-show.transition.out="modalDeactivate" style="display:none">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-show.transition="modalDeactivate" x-on:click.away="modalDeactivate = false">
                    <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                        <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150" aria-label="Close">
                            <!-- Heroicon name: x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-on:click="modalDeactivate = false">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-headline">
                                Deactivate account
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    Are you sure you want to deactivate your account? All of your data will be permanently removed from our servers forever. This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="deactivate">
                                Deactivate
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" x-on:click="modalDeactivate = false">
                                Cancel
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
