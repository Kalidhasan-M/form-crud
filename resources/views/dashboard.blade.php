<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="bg-green-500 text-white p-3">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="bg-red-500 text-white p-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @include('form')
</x-app-layout>
