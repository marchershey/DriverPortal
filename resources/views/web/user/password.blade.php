<div class="space-y-10">
    <div class="space-y-4">
        <div class="">
            <h2 class="text-lg leading-6 font-medium text-gray-900">Change Password</h2>
            <p class="mt-1 text-sm leading-5 text-gray-500">Please note that when changing your password, we ask you to set yourself a secure password that contains both uppercase and lowercase letters as well as numbers. The only requirement is your password must contain 8 characters.</p>
        </div>

        <div class="border-b border-gray-200"></div>

        @include('layout.alerts')

        <div class="sm:flex justify-between">
            <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Current Password
            </label>
            <div class="relative mt-1 sm:mt-0 sm:w-1/2">
                <div class="w-full rounded-md shadow-sm sm:max-w-xs">
                    <input type="password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Current Password" wire:model="currentPassword">
                </div>
            </div>
        </div>

        <div class="sm:flex justify-between">
            <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                New Password
            </label>
            <div class="mt-1 sm:mt-0 sm:w-1/2">
                <div class="w-full rounded-md shadow-sm sm:max-w-xs">
                    <input type="password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="New Password" wire:model="newPassword">
                </div>
            </div>
        </div>
        <div class="sm:flex justify-between">
            <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Confirm New Password
            </label>
            <div class="mt-1 sm:mt-0 sm:w-1/2">
                <div class="w-full rounded-md shadow-sm sm:max-w-xs">
                    <input type="password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Confirm New Password" wire:model="confirmPassword">
                </div>
            </div>
        </div>


        <div class="flex justify-end">
            <span class="inline-flex rounded-md mt-1 sm:text-sm leading-4 font-medium">
                <button type="button" class="inline-flex items-center shadow-sm px-3 py-2 border border-transparent rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150" wire:click="submit" wire:loading.remove wire:target="submit">
                    Change Password
                </button>
                <div class="px-3 py-1 -mt-px" wire:loading wire:target="submit">
                    <svg class="animate-spin h-7 w-7 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </span>
        </div>
    </div>



</div>
