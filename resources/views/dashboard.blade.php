<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">Welkom bij MiniStay</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-slate-900 p-7 shadow-2xl shadow-black/30">
                <p class="text-slate-300">Hier kun je jouw reserveringen bekijken of een nieuw verblijf vinden.</p>
                <div class="mt-5 flex gap-4">
                    <a href="{{ route('properties.index') }}" class="rounded bg-rose-500 px-4 py-2 text-white">Woningen bekijken</a>
                    <a href="{{ route('bookings.index') }}" class="rounded border border-white/10 px-4 py-2 text-slate-300">Mijn boekingen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
