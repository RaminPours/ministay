<x-guest-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">MiniStay</h1>
                <p class="text-gray-600 mt-1">Vind een eenvoudig en fijn verblijf.</p>
            </div>
            @auth
                <a href="{{ route('bookings.index') }}" class="text-sm font-medium text-indigo-600">Mijn boekingen</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600">Inloggen</a>
            @endauth
        </div>

        @if ($properties->isEmpty())
            <p class="rounded-lg bg-white p-6 text-gray-600 shadow">Er zijn nog geen woningen toegevoegd.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($properties as $property)
                    <a href="{{ route('properties.show', $property) }}" class="rounded-xl bg-white p-6 shadow hover:shadow-lg transition">
                        <div class="text-4xl mb-4">🏠</div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ $property->titel }}</h2>
                        <p class="mt-1 text-gray-600">📍 {{ $property->stad }}</p>
                        <p class="mt-4 text-sm text-gray-600 line-clamp-3">{{ $property->beschrijving }}</p>
                        <p class="mt-5 font-bold text-indigo-600">€{{ number_format($property->prijs_per_nacht, 2, ',', '.') }} <span class="font-normal text-gray-500">/ nacht</span></p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-guest-layout>
