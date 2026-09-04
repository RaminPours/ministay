<nav class="border-b border-white/10 bg-slate-950 text-white">
 <div class="mx-auto flex min-h-20 max-w-7xl items-center justify-between gap-4 px-5 sm:px-6">
  <a href="{{ route('properties.index') }}" class="flex items-center gap-2 text-xl font-bold"><span class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-500">⌂</span>Mini<span class="text-rose-400">Stay</span></a>
  <div class="hidden items-center gap-1 text-sm font-medium md:flex">
   <a href="{{ route('properties.index') }}" class="rounded-full px-4 py-2 text-slate-300 hover:bg-white/10">Ontdekken</a><a href="{{ route('bookings.index') }}" class="rounded-full px-4 py-2 text-slate-300 hover:bg-white/10">Mijn boekingen</a><a href="{{ route('properties.create') }}" class="rounded-full px-4 py-2 text-slate-300 hover:bg-white/10">Verhuur je woning</a>
  </div>
  <div class="flex items-center gap-3"><a href="{{ route('profile.edit') }}" class="hidden text-sm text-slate-300 sm:block">{{ Auth::user()->name }}</a><form method="POST" action="{{ route('logout') }}">@csrf<button class="rounded-full border border-white/15 px-4 py-2 text-sm text-slate-200 hover:bg-white/10">Uitloggen</button></form></div>
 </div>
</nav>