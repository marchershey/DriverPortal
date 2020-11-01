@if(session()->has('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mb-4" role="alert">
    <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

@if(session()->has('warning'))
<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative text-center mb-4" role="alert">
    <span class="font-semibold">{{ session('warning') }}</span>
</div>
@endif

@if(session()->has('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mb-4" role="alert">
    <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif