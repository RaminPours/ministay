<x-guest-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">
        <a href="{{ route('properties.index') }}" class="text-sm font-medium text-indigo-600">← Alle woningen</a>

        <div class="mt-5 grid gap-8 lg:grid-cols-[1fr_340px]">
            <section>
                <div class="rounded-xl bg-indigo-100 h-52 flex items-center justify-center text-7xl">🏠</div>
                <h1 class="mt-6 text-3xl font-bold text-gray-900">{{ $property->titel }}</h1>
                <p class="mt-2 text-gray-600">📍 {{ $property->stad }}</p>
                <p class="mt-6 leading-7 text-gray-700">{{ $property->beschrijving }}</p>
                <p class="mt-6 text-sm text-gray-600">{{ $property->aantal_slaapkamers }} slaapkamers · {{ $property->aantal_bedden }} bedden · {{ $property->aantal_badkamers }} badkamers</p>
            </section>

            <aside class="h-fit rounded-xl bg-white p-6 shadow">
                <p class="text-2xl font-bold text-gray-900">€{{ number_format($property->prijs_per_nacht, 2, ',', '.') }} <span class="text-sm font-normal text-gray-500">per nacht</span></p>

                @auth
                    <form method="POST" action="{{ route('bookings.store', $property) }}" class="mt-5 space-y-4">
                        @csrf
                        <div>
                            <label for="starts_at" class="block text-sm font-medium text-gray-700">Aankomst</label>
                            <input id="starts_at" name="starts_at" type="date" min="{{ now()->toDateString() }}" value="{{ old('starts_at') }}" required class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label for="ends_at" class="block text-sm font-medium text-gray-700">Vertrek</label>
                            <input id="ends_at" name="ends_at" type="date" min="{{ now()->addDay()->toDateString() }}" value="{{ old('ends_at') }}" required class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <x-input-error :messages="$errors->get('starts_at')" class="mt-2" />
                        <x-input-error :messages="$errors->get('ends_at')" class="mt-2" />
                        <button class="w-full rounded-md bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-500">Reserveren</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mt-5 block w-full rounded-md bg-indigo-600 px-4 py-2 text-center font-semibold text-white hover:bg-indigo-500">Log in om te reserveren</a>
                @endauth
            </aside>
        </div>
    </div>
</x-guest-layout>
