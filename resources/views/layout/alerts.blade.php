@if(count($errors) > 0)
<div class="rounded-md bg-red-50 p-4 mb-6">
    <div class="flex sm:text-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3 w-full sm:text-center -ml-5">
            <p class="text-sm leading-5 font-medium text-red-800">
                {{ $errors->first() }}
            </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('error'))
<div class="rounded-md bg-red-50 p-4 mb-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" x-description="Heroicon name: x-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 w-full sm:text-center -ml-5">
            <p class="text-sm leading-5 font-medium text-red-800">
                {{ session('error') }}
            </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('success'))
<div class="rounded-md bg-green-400 text-white p-4 mb-6">
    <div class="flex items-center justify-center gap-4">
        <svg class="h-5 w-5" x-description="Heroicon name: check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
        <p class="text-sm leading-5 font-medium">
            {{ session('success') }}
        </p>
    </div>
</div>
@endif

@if (session()->has('info'))
<div class="rounded-md bg-blue-50 p-4 mb-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-blue-400" x-description="Heroicon name: information-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 w-full sm:text-center">
            <p class="text-sm leading-5 font-medium text-blue-800">
                {{ session('info') }}
            </p>
        </div>
    </div>
</div>
@endif

@if (session()->has('warning'))
<div class="rounded-md bg-yellow-50 p-4 mb-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-400" x-description="Heroicon name: exclamation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 w-full sm:text-center">
            <p class="text-sm leading-5 font-medium text-yellow-800">
                {{ session('warning') }}
            </p>
        </div>
    </div>
</div>
@endif
