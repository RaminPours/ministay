<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Welkom bij MiniStay</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700">Hier kun je jouw reserveringen bekijken of een nieuw verblijf vinden.</p>
                <div class="mt-5 flex gap-4">
                    <a href="{{ route('properties.index') }}" class="rounded bg-indigo-600 px-4 py-2 text-white">Woningen bekijken</a>
                    <a href="{{ route('bookings.index') }}" class="rounded border border-gray-300 px-4 py-2 text-gray-700">Mijn boekingen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
