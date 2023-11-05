<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game of Life') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        @include('partials.controls')

        @include('partials.board')

        @include('partials.footer')
    </div>
</x-app-layout>