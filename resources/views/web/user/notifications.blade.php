<div class="space-y-10">
    <div class="space-y-4">
        <div class="">
            <h2 class="text-lg leading-6 font-medium text-gray-900">Email Notifications</h2>
            <p class="mt-1 text-sm leading-5 text-gray-500">Below you can adjust what emails you receive from {{config('app.name')}}. </p>
        </div>

        <div class="border-b border-gray-200"></div>

        @include('layout.alerts')

        <div class="space-y-2">
            <ul class="divide-y divide-gray-200 -mt-4">
                <li class="py-4 flex items-center justify-between space-x-4">
                    <div class="flex flex-col">
                        <p id="privacy-option-label-1" class="text-sm leading-5 font-semibold text-gray-900">
                            Toggle all emails
                        </p>
                    </div>
                    <span role="checkbox" tabindex="0" x-on:click="on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" aria-labelledby="privacy-option-label-1" aria-describedby="privacy-option-description-1" x-data="{ on: false }" :class="{ 'bg-gray-200': !on, 'bg-indigo-500': on }" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                        <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                    </span>
                </li>
                <li class="py-4 flex items-center justify-between space-x-4">
                    <div class="flex flex-col">
                        <p id="privacy-option-label-2" class="text-sm leading-5 font-medium text-gray-900">
                            Login Notifications
                        </p>
                        <p id="privacy-option-description-2" class="text-sm leading-5 text-gray-500">
                            Receive an email notification each time your account is logged in.
                        </p>
                    </div>
                    <span role="checkbox" tabindex="0" x-on:click="on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" aria-labelledby="privacy-option-label-2" aria-describedby="privacy-option-description-2" x-data="{ on: false }" :class="{ 'bg-gray-200': !on, 'bg-indigo-500': on }" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                        <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                    </span>
                </li>

                <li class="py-4 flex items-center justify-between space-x-4">
                    <div class="flex flex-col">
                        <p id="privacy-option-label-2" class="text-sm leading-5 font-medium text-gray-900">
                            Login Notifications
                        </p>
                        <p id="privacy-option-description-2" class="text-sm leading-5 text-gray-500">
                            Receive an email notification each time your account is logged in.
                        </p>
                    </div>
                    <span role="checkbox" tabindex="0" x-on:click="on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" aria-labelledby="privacy-option-label-2" aria-describedby="privacy-option-description-2" x-data="{ on: false }" :class="{ 'bg-gray-200': !on, 'bg-indigo-500': on }" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                        <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                    </span>
                </li>

                {{-- <li class="py-4 flex items-center justify-between space-x-4">
                    <div class="flex flex-col">
                        <p id="privacy-option-label-2" class="text-sm leading-5 font-medium text-gray-900">
                            Default
                        </p>
                        <p id="privacy-option-description-2" class="text-sm leading-5 text-gray-500">
                            Receive an email notification each time your account is logged in.
                        </p>
                    </div>
                    <span role="checkbox" tabindex="0" x-on:click="on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" aria-labelledby="privacy-option-label-2" aria-describedby="privacy-option-description-2" x-data="{ on: false }" :class="{ 'bg-gray-200': !on, 'bg-indigo-500': on }" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                        <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                    </span>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
