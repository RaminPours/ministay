<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Beschikbare woningen</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-sm mb-2">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <h1 class="text-center text-4xl font-bold text-gray-800">
                Beschikbare woningen
            </h1>

            <p class="text-center text-gray-500 mt-2">
                Vind jouw perfecte verblijf
            </p>
        </div>
    </header>

    <!-- Woningen -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($properties as $prop)

                <a
                    href="{{ route('properties.show', $prop) }}"
                    class="block bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300"
                >

                    <!-- Afbeelding -->
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                        <span class="text-white text-6xl">🏠</span>
                    </div>

                    <!-- Content -->
                    <div class="p-6">

                        <!-- Titel -->
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $prop->titel }}
                        </h2>

                        <!-- Stad -->
                        <p class="text-gray-500 mb-4">
                            📍 {{ $prop->stad }}
                        </p>

                        <!-- Beschrijving -->
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            {{ $prop->beschrijving }}
                        </p>

                        <!-- Eigenschappen -->
                        <div class="grid grid-cols-3 gap-3 border-t border-b border-gray-200 py-4 mb-5">

                            <div class="text-center">
                                <div class="text-xl mb-1">🛏️</div>
                                <p class="font-semibold text-gray-800">
                                    {{ $prop->aantal_slaapkamers }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Slaapkamers
                                </p>
                            </div>

                            <div class="text-center">
                                <div class="text-xl mb-1">🛌</div>
                                <p class="font-semibold text-gray-800">
                                    {{ $prop->aantal_bedden }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Bedden
                                </p>
                            </div>

                            <div class="text-center">
                                <div class="text-xl mb-1">🚿</div>
                                <p class="font-semibold text-gray-800">
                                    {{ $prop->aantal_badkamers }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Badkamers
                                </p>
                            </div>

                        </div>

                        <!-- Prijs -->
                        <div class="flex items-center justify-between">

                            <div>
                                <span class="text-2xl font-bold text-indigo-600">
                                    €{{ $prop->prijs_per_nacht }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    / nacht
                                </span>
                            </div>

                            

                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </main>

</body>
</html>
