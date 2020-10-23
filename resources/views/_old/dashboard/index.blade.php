@extends('inc.layouts.app')

@section('header')
<header class="bg-white border-b border-gray-400">
    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
        <h1 class="text-2xl font-bold leading-tight text-gray-700">Dashboard</h1>
        <div class="">
            <a href="{{ route('dispatch.start') }}" class="inline-block text-sm bg-green-500 border border-green-600 text-white font-bold rounded px-2 py-1">New Dispatch</a>
        </div>
    </div>
</header>
@endsection

@section('content')

<a href="" class="block w-full bg-blue-100 rounded border border-blue-500 p-4 mb-4">
    <div class="text-center font-bold">
        <h1>You're currently on Dispatch <span class="text-blue-500">#939293</span></h1>
    </div>
</a>

<div class="w-full bg-white border border-gray-400 rounded p-4 mb-4">
    <div class="flex justify-between content-center">
        <h1 class="font-bold">Recent Dispatches</h1>
        <div class="text-xs leading-loose">
            <div class="font-bold inline mr-1">Sort by:</div>
            <div class="inline">Weekly</div>
        </div>
    </div>
    <div class="flex">
        <table class="table-auto mt-4 text-xs w-full">
            <tbody>
                @if(count($dispatches) > 0)
                @foreach($dispatches as $dispatch)
                <tr>
                    <td class="py-1 pr-4 font-bold text-blue-500"><a href="/dispatch/{{$dispatch->reference_number}}">#{{$dispatch->reference_number}}</a></td>
                    <td class="py-1 px-4 text-center">{{$dispatch->starting_date}}</td>
                    <td class="py-1 px-4 text-center text-green-500 font-bold">${{round($dispatch->grossPay(), 2)}}</td>
                    <td class="py-1 pl-4 text-center">
                        <span class="w-full rounded px-2 bg-green-300 border border-green-500 text-green-800 inline-block ">
                            in progress
                        </span>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">
                        No data.
                    </td>
                </tr>
                @endif
                {{-- <tr>
                    <td class="pr-4 font-bold text-blue-500">#9431226</td>
                    <td class="px-4 text-center">09/20/2020</td>
                    <td class="pl-4 text-center">
                        <span class="w-full rounded px-2 bg-green-300 border border-green-500 text-green-800 inline-block ">
                            in progress
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="pr-4 font-bold text-blue-500">#9431226</td>
                    <td class="px-4 text-center">09/20/2020</td>
                    <td class="pl-4 text-center">
                        <span class="w-full rounded px-2 bg-blue-300 border border-blue-500 text-blue-800 inline-block ">
                            pending
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="pr-4 font-bold text-blue-500">#9431226</td>
                    <td class="px-4 text-center">09/20/2020</td>
                    <td class="pl-4 text-center">
                        <span class="w-full rounded px-2 bg-gray-300 border border-gray-500 text-gray-800 inline-block ">
                            completed
                        </span>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-between content-center bg-white border border-gray-400 rounded p-4 mb-4">
    <h1 class="font-bold">Income Analytics</h1>
    <div class="text-xs leading-loose">
        <div class="font-bold inline mr-1">Sort by:</div>
        <div class="inline">Weekly</div>
    </div>
</div>

<div class="bg-white border border-gray-400 rounded p-4 mb-4">
    <div class="flex justify-between content-center">
        <h1 class="font-bold">Recent Deposits</h1>
        <a href="#" class="text-xs leading-loose bg-blue-500 px-3 text-white font-bold rounded hover:bg-blue-600">
            View All
        </a>
    </div>
    <table class="table-auto mt-4 text-xs w-full">
        <tbody>
            <tr>
                <td class="px-4 py-2 font-bold text-green-500">$1,200</td>
                <td class="px-4 py-2 text-center">
                    <span class="rounded px-2 bg-yellow-300 text-yellow-700">
                        estimated
                    </span>
                </td>
                <td class="px-4 py-2 text-right">09/20/2020</td>
            </tr>
            <tr>
                <td class="px-4 py-2 font-bold text-green-500">$1,200</td>
                <td class="px-4 py-2 text-center">
                    <span class="rounded px-2 bg-yellow-300 text-yellow-700">
                        estimated
                    </span>
                </td>
                <td class="px-4 py-2 text-right">09/20/2020</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection