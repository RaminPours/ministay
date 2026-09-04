<nav class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex min-h-20 max-w-7xl items-center justify-between gap-4 px-5 sm:px-6">
        <a href="{{ route('properties.index') }}" class="flex shrink-0 items-center gap-2 text-xl font-bold tracking-tight text-rose-500">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500 text-lg text-white">⌂</span>
            <span>MiniStay</span>
        </a>

        <div class="hidden items-center gap-1 text-sm font-medium md:flex">
            <a href="{{ route('properties.index') }}" class="rounded-full px-4 py-2 {{ request()->routeIs('properties.index', 'properties.show') ? 'bg-rose-50 text-rose-600' : 'text-slate-600 hover:bg-slate-100' }}">Ontdekken</a>
            <a href="{{ route('bookings.index') }}" class="rounded-full px-4 py-2 {{ request()->routeIs('bookings.*') ? 'bg-rose-50 text-rose-600' : 'text-slate-600 hover:bg-slate-100' }}">Mijn boekingen</a>
            @if (Auth::user()->is_admin)
                <a href="{{ route('properties.create') }}" class="rounded-full px-4 py-2 {{ request()->routeIs('properties.create') ? 'bg-rose-50 text-rose-600' : 'text-slate-600 hover:bg-slate-100' }}">Verhuur je woning</a>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('profile.edit') }}" class="hidden text-sm font-medium text-slate-600 hover:text-rose-500 sm:block">{{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-full border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">Uitloggen</button>
            </form>
        </div>
    </div>

    <div class="flex gap-2 overflow-x-auto border-t border-slate-100 px-5 py-3 text-sm font-medium md:hidden">
        <a href="{{ route('properties.index') }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-slate-600 hover:bg-slate-100">Ontdekken</a>
        <a href="{{ route('bookings.index') }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-slate-600 hover:bg-slate-100">Mijn boekingen</a>
        @if (Auth::user()->is_admin)
            <a href="{{ route('properties.create') }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-slate-600 hover:bg-slate-100">Woning toevoegen</a>
        @endif
    </div>
</nav>
