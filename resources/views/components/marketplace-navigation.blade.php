<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-5 sm:px-6">
        <a href="{{ route('properties.index') }}" class="flex shrink-0 items-center gap-2 text-xl font-bold tracking-tight text-rose-500">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500 text-lg text-white">⌂</span>
            <span>MiniStay</span>
        </a>

        <a href="{{ route('properties.index') }}" class="hidden min-w-0 max-w-xl flex-1 items-center rounded-full border border-slate-200 bg-white py-2 pl-5 pr-2 shadow-sm transition hover:shadow-md lg:flex">
            <span class="border-r border-slate-200 pr-5 text-sm font-semibold text-slate-800">Waarheen?</span>
            <span class="border-r border-slate-200 px-5 text-sm text-slate-500">Wanneer?</span>
            <span class="pl-5 text-sm text-slate-500">Gasten</span>
            <span class="ml-auto flex h-8 w-8 items-center justify-center rounded-full bg-rose-500 text-sm text-white">⌕</span>
        </a>

        <div class="flex shrink-0 items-center gap-2 text-sm font-medium">
            @auth
                @if (auth()->user()->is_admin)
                    <a href="{{ route('properties.create') }}" class="hidden rounded-full px-4 py-2 text-slate-700 hover:bg-slate-100 sm:block">Verhuur je woning</a>
                @endif
                <a href="{{ route('bookings.index') }}" class="hidden rounded-full px-4 py-2 text-slate-700 hover:bg-slate-100 md:block">Mijn boekingen</a>
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
</header>
