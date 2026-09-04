<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $property->titel }} · MiniStay</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <x-marketplace-navigation />

    <main class="mx-auto max-w-6xl px-6 py-10">
        <a href="{{ route('properties.index') }}" class="text-sm font-medium text-rose-400 hover:text-indigo-500">← Alle woningen</a>

        <div class="mt-6 grid gap-10 lg:grid-cols-[minmax(0,1fr)_360px]">
            <section>
                @if ($property->image_path)
                    <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property->titel }}" class="h-80 w-full rounded-2xl object-cover sm:h-96">
                @else
                    <div class="flex h-80 items-center justify-center rounded-2xl bg-gradient-to-br from-slate-800 to-slate-700 text-8xl sm:h-96">🏠</div>
                @endif
                <h1 class="mt-8 text-4xl font-bold tracking-tight">{{ $property->titel }}</h1>
                <p class="mt-3 text-slate-400">📍 {{ $property->stad }}</p>
                <div class="mt-7 border-y border-white/10 py-6 text-sm text-slate-400">
                    {{ $property->aantal_slaapkamers }} slaapkamers · {{ $property->aantal_bedden }} bedden · {{ $property->aantal_badkamers }} badkamers
                </div>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">{{ $property->beschrijving }}</p>
                @auth
                    @if (auth()->user()->is_admin)
                        <form method="POST" action="{{ route('properties.destroy', $property) }}" class="mt-6" onsubmit="return confirm('Deze woning verwijderen?')">@csrf @method('DELETE')<button class="rounded-lg border border-red-400/40 px-4 py-2 text-sm text-red-300 hover:bg-red-500/10">Woning verwijderen</button></form>
                    @endif
                @endauth
            </section>

            <aside class="h-fit rounded-2xl bg-slate-900 p-6 shadow-lg ring-1 ring-slate-200 lg:sticky lg:top-6">
                <p class="text-2xl font-bold">€{{ number_format($property->prijs_per_nacht, 2, ',', '.') }} <span class="text-sm font-normal text-slate-400">per nacht</span></p>

                @auth
                    <form method="POST" action="{{ route('bookings.store', $property) }}" class="mt-6 space-y-4">
                        @csrf
                        <div>
                            <label for="starts_at" class="block text-sm font-medium text-slate-300">Aankomst</label>
                            <input id="starts_at" name="starts_at" type="date" min="{{ now()->toDateString() }}" value="{{ old('starts_at') }}" required class="mt-1 block w-full rounded-lg border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="ends_at" class="block text-sm font-medium text-slate-300">Vertrek</label>
                            <input id="ends_at" name="ends_at" type="date" min="{{ now()->addDay()->toDateString() }}" value="{{ old('ends_at') }}" required class="mt-1 block w-full rounded-lg border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        @if ($errors->any())
                            <p class="text-sm text-red-600">{{ $errors->first() }}</p>
                        @endif
                        <button class="w-full rounded-lg bg-rose-500 px-4 py-3 font-semibold text-white hover:bg-rose-400">Reserveren</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mt-6 block w-full rounded-lg bg-rose-500 px-4 py-3 text-center font-semibold text-white hover:bg-rose-400">Log in om te reserveren</a>
                @endauth
            </aside>
        </div>
    </main>
</body>
</html>
