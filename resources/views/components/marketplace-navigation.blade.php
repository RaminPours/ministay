<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-5 sm:px-6">
        <a href="{{ route('properties.index') }}" class="flex shrink-0 items-center gap-2 text-xl font-bold tracking-tight text-rose-500">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500 text-lg text-white">⌂</span>
            <span>MiniStay</span>
        </a>

        <form action="{{ route('properties.index') }}" method="GET" class="hidden min-w-0 max-w-2xl flex-1 items-center rounded-full border border-slate-200 bg-white py-2 pl-5 pr-2 shadow-sm transition hover:shadow-md lg:flex">
            <input name="city" value="{{ request('city') }}" placeholder="Waarheen?" class="min-w-0 flex-1 border-0 border-r border-slate-200 bg-transparent p-0 pr-4 text-sm font-semibold text-slate-800 placeholder:text-slate-500 focus:ring-0">
            <input name="starts_at" value="{{ request('starts_at') }}" type="date" aria-label="Aankomst" class="w-32 border-0 border-r border-slate-200 bg-transparent px-4 py-0 text-xs text-slate-600 focus:ring-0">
            <input name="ends_at" value="{{ request('ends_at') }}" type="date" aria-label="Vertrek" class="w-32 border-0 border-r border-slate-200 bg-transparent px-4 py-0 text-xs text-slate-600 focus:ring-0">
            <input name="guests" value="{{ request('guests') }}" type="number" min="1" placeholder="Gasten" aria-label="Aantal gasten" class="w-20 border-0 bg-transparent px-4 py-0 text-sm text-slate-600 placeholder:text-slate-500 focus:ring-0">
            <button type="submit" class="ml-auto flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-rose-500 text-sm text-white hover:bg-rose-600" aria-label="Zoeken">⌕</button>
        </form>

        <div class="flex shrink-0 items-center gap-2 text-sm font-medium">
            @auth
                @if (auth()->user()->is_admin)
                    <a href="{{ route('properties.create') }}" class="hidden rounded-full px-4 py-2 text-slate-700 hover:bg-slate-100 xl:block">Verhuur je woning</a>
                @endif
                <a href="{{ route('bookings.index') }}" class="hidden rounded-full px-4 py-2 text-slate-700 hover:bg-slate-100 xl:block">Mijn boekingen</a>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 rounded-full border border-slate-300 py-1.5 pl-2 pr-3 shadow-sm transition hover:shadow-md">
                    <span class="text-lg leading-none">☰</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-800 text-xs font-bold text-white">{{ Str::upper(Str::substr(auth()->user()->name, 0, 1)) }}</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="hidden rounded-full px-4 py-2 text-slate-700 hover:bg-slate-100 sm:block">Inloggen</a>
                <a href="{{ route('register') }}" class="rounded-full bg-rose-500 px-4 py-2 text-white shadow-sm hover:bg-rose-600">Aanmelden</a>
            @endauth
        </div>
    </div>

    <form action="{{ route('properties.index') }}" method="GET" class="border-t border-slate-100 px-5 py-3 lg:hidden">
        <div class="mx-auto flex max-w-7xl gap-2">
            <input name="city" value="{{ request('city') }}" placeholder="Zoek op stad" class="min-w-0 flex-1 rounded-full border-slate-300 text-sm focus:border-rose-500 focus:ring-rose-500">
            <input name="guests" value="{{ request('guests') }}" type="number" min="1" placeholder="Gasten" class="w-24 rounded-full border-slate-300 text-sm focus:border-rose-500 focus:ring-rose-500">
            <button type="submit" class="rounded-full bg-rose-500 px-4 text-sm font-semibold text-white hover:bg-rose-600">Zoek</button>
        </div>
    </form>
</header>
