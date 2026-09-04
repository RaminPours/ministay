<header class="sticky top-0 z-30 border-b border-white/10 bg-slate-950/95 text-white backdrop-blur">
 <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-5 sm:px-6">
  <a href="{{ route('properties.index') }}" class="flex items-center gap-2 text-xl font-bold"><span class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500">⌂</span>Mini<span class="text-rose-400">Stay</span></a>
  <form action="{{ route('properties.index') }}" method="GET" class="hidden min-w-0 max-w-2xl flex-1 items-center rounded-full border border-white/10 bg-slate-900 py-2 pl-5 pr-2 lg:flex">
   <input name="city" value="{{ request('city') }}" placeholder="Waarheen?" class="min-w-0 flex-1 border-0 border-r border-white/10 bg-transparent p-0 pr-4 text-sm text-white placeholder:text-slate-400 focus:ring-0">
   <input name="starts_at" value="{{ request('starts_at') }}" type="date" class="w-32 border-0 border-r border-white/10 bg-transparent px-4 py-0 text-xs text-slate-300 [color-scheme:dark] focus:ring-0">
   <input name="ends_at" value="{{ request('ends_at') }}" type="date" class="w-32 border-0 border-r border-white/10 bg-transparent px-4 py-0 text-xs text-slate-300 [color-scheme:dark] focus:ring-0">
   <input name="guests" value="{{ request('guests') }}" type="number" min="1" placeholder="Gasten" class="w-20 border-0 bg-transparent px-4 py-0 text-sm text-slate-300 placeholder:text-slate-400 focus:ring-0">
   <button class="ml-auto flex h-8 w-8 items-center justify-center rounded-full bg-rose-500">⌕</button>
  </form>
  <div class="flex items-center gap-2 text-sm">@auth <a href="{{ route('properties.create') }}" class="hidden rounded-full px-4 py-2 text-slate-200 hover:bg-white/10 xl:block">Verhuur je woning</a><a href="{{ route('bookings.index') }}" class="hidden rounded-full px-4 py-2 text-slate-200 hover:bg-white/10 xl:block">Mijn boekingen</a><a href="{{ route('dashboard') }}" class="rounded-full border border-white/15 px-4 py-2 hover:bg-white/10">Mijn account</a>@else <a href="{{ route('login') }}" class="hidden px-4 py-2 text-slate-200 sm:block">Inloggen</a><a href="{{ route('register') }}" class="rounded-full bg-rose-500 px-4 py-2">Aanmelden</a>@endauth</div>
 </div>
</header>