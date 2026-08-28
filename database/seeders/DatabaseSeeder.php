<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $host = User::factory()->create([
            'name' => 'MiniStay Host',
            'email' => 'host@ministay.test',
        ]);

        Property::create([
            'user_id' => $host->id,
            'titel' => 'Rustig appartement in Utrecht',
            'beschrijving' => 'Een eenvoudig en comfortabel appartement dichtbij het centrum.',
            'stad' => 'Utrecht',
            'prijs_per_nacht' => 85,
            'aantal_slaapkamers' => 1,
            'aantal_bedden' => 2,
            'aantal_badkamers' => 1,
        ]);

        Property::create([
            'user_id' => $host->id,
            'titel' => 'Lichte kamer in Amsterdam',
            'beschrijving' => 'Een fijne kamer voor een kort verblijf in een rustige buurt.',
            'stad' => 'Amsterdam',
            'prijs_per_nacht' => 65,
            'aantal_slaapkamers' => 1,
            'aantal_bedden' => 1,
            'aantal_badkamers' => 1,
        ]);
    }
}
