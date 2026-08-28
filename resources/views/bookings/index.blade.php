<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mijn boekingen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-green-800">{{ session('status') }}</div>
            @endif

            @forelse ($bookings as $booking)
                <article class="bg-white shadow-sm sm:rounded-lg p-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="font-semibold text-lg text-gray-900">{{ $booking->property->titel }}</h3>
                        <p class="text-gray-600">{{ $booking->property->stad }}</p>
                        <p class="mt-2 text-sm text-gray-700">{{ $booking->starts_at->format('d-m-Y') }} t/m {{ $booking->ends_at->format('d-m-Y') }} · €{{ number_format($booking->total_price, 2, ',', '.') }}</p>
                        <p class="mt-1 text-sm font-medium {{ $booking->status === 'cancelled' ? 'text-red-600' : 'text-green-600' }}">{{ $booking->status === 'cancelled' ? 'Geannuleerd' : 'Bevestigd' }}</p>
                    </div>
                    @if ($booking->status !== 'cancelled')
                        <form method="POST" action="{{ route('bookings.cancel', $booking) }}">
                            @csrf
                            @method('PATCH')
                            <button class="rounded border border-red-300 px-4 py-2 text-sm font-medium text-red-700 hover:bg-red-50">Annuleren</button>
                        </form>
                    @endif
                </article>
            @empty
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-600">
                    Je hebt nog geen boekingen. <a href="{{ route('properties.index') }}" class="font-medium text-indigo-600">Bekijk woningen</a>.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
