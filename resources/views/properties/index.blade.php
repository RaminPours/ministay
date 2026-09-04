<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiniStay · Woningen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <x-marketplace-navigation />

    <main class="mx-auto max-w-6xl px-6 py-12">
        <div class="mb-10 max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600">Eenvoudig verblijven</p>
            <h1 class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Vind jouw volgende MiniStay.</h1>
            <p class="mt-4 text-lg text-slate-600">Een helder overzicht van fijne, betaalbare verblijven.</p>
        </div>

        @if ($properties->isEmpty())
            <p class="rounded-xl bg-white p-6 text-slate-600 shadow-sm ring-1 ring-slate-200">Er zijn nog geen woningen toegevoegd.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($properties as $property)
                    <a href="{{ route('properties.show', $property) }}" class="group overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                        @if ($property->image_path)
                            <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property->titel }}" class="h-52 w-full object-cover">
                        @else
                            <div class="flex h-52 items-center justify-center bg-gradient-to-br from-indigo-100 to-violet-100 text-7xl">🏠</div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-slate-900 group-hover:text-indigo-600">{{ $property->titel }}</h2>
                            <p class="mt-2 text-sm text-slate-600">📍 {{ $property->stad }}</p>
                            <p class="mt-4 min-h-12 text-sm leading-6 text-slate-600">{{ Str::limit($property->beschrijving, 100) }}</p>
                            <p class="mt-5 text-lg font-bold text-slate-900">€{{ number_format($property->prijs_per_nacht, 2, ',', '.') }} <span class="text-sm font-normal text-slate-500">per nacht</span></p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>
