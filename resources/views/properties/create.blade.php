<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">Woning toevoegen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data" class="space-y-6 rounded-3xl border border-white/10 bg-slate-900 p-7 shadow-2xl shadow-black/30">
                @csrf

                <div>
                    <label for="titel" class="block text-sm font-medium text-slate-300">Titel</label>
                    <input id="titel" name="titel" value="{{ old('titel') }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                    <x-input-error :messages="$errors->get('titel')" class="mt-2" />
                </div>

                <div>
                    <label for="stad" class="block text-sm font-medium text-slate-300">Stad</label>
                    <input id="stad" name="stad" value="{{ old('stad') }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                    <x-input-error :messages="$errors->get('stad')" class="mt-2" />
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-slate-300">Foto <span class="text-gray-400">(optioneel)</span></label>
                    <input id="image" name="image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-slate-400">
                    <p class="mt-1 text-xs text-slate-400">JPG, PNG of WebP, maximaal 5 MB.</p>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <label for="beschrijving" class="block text-sm font-medium text-slate-300">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="5" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">{{ old('beschrijving') }}</textarea>
                    <x-input-error :messages="$errors->get('beschrijving')" class="mt-2" />
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="prijs_per_nacht" class="block text-sm font-medium text-slate-300">Prijs per nacht (€)</label>
                        <input id="prijs_per_nacht" name="prijs_per_nacht" type="number" min="1" step="0.01" value="{{ old('prijs_per_nacht') }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                        <x-input-error :messages="$errors->get('prijs_per_nacht')" class="mt-2" />
                    </div>
                    <div>
                        <label for="aantal_slaapkamers" class="block text-sm font-medium text-slate-300">Slaapkamers</label>
                        <input id="aantal_slaapkamers" name="aantal_slaapkamers" type="number" min="0" value="{{ old('aantal_slaapkamers', 1) }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                    </div>
                    <div>
                        <label for="aantal_bedden" class="block text-sm font-medium text-slate-300">Bedden</label>
                        <input id="aantal_bedden" name="aantal_bedden" type="number" min="1" value="{{ old('aantal_bedden', 1) }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                    </div>
                    <div>
                        <label for="aantal_badkamers" class="block text-sm font-medium text-slate-300">Badkamers</label>
                        <input id="aantal_badkamers" name="aantal_badkamers" type="number" min="0" value="{{ old('aantal_badkamers', 1) }}" required class="mt-1 block w-full rounded-xl border-white/10 bg-slate-800 text-slate-100">
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('properties.index') }}" class="rounded-md border border-white/10 px-4 py-2 text-slate-300">Annuleren</a>
                    <button class="rounded-xl bg-rose-500 px-4 py-2 font-semibold text-white hover:bg-rose-400">Woning opslaan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
