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

        $properties = [
            ['titel'=>'Canal Loft','stad'=>'Amsterdam','prijs'=>145,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1534351590666-13e3e96b5017'],
            ['titel'=>'City Studio','stad'=>'Amsterdam','prijs'=>95,'slaapkamers'=>1,'bedden'=>1,'badkamers'=>1,'foto'=>'photo-1505693416388-ac5ce068fe85'],
            ['titel'=>'Rustig appartement','stad'=>'Utrecht','prijs'=>85,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1522708323590-d24dbb6b0267'],
            ['titel'=>'Design loft','stad'=>'Rotterdam','prijs'=>120,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1600210492486-724fe5c67fb0'],
            ['titel'=>'Knus stadsverblijf','stad'=>'Den Haag','prijs'=>90,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1560448204-e02f11c3d0e2'],
            ['titel'=>'Lichte studio','stad'=>'Eindhoven','prijs'=>75,'slaapkamers'=>1,'bedden'=>1,'badkamers'=>1,'foto'=>'photo-1560185007-cde436f6a4d0'],
            ['titel'=>'Familiewoning aan zee','stad'=>'Zandvoort','prijs'=>175,'slaapkamers'=>3,'bedden'=>5,'badkamers'=>2,'foto'=>'photo-1494526585095-c41746248156'],
            ['titel'=>'Modern huis','stad'=>'Haarlem','prijs'=>135,'slaapkamers'=>2,'bedden'=>4,'badkamers'=>1,'foto'=>'photo-1600585154340-be6161a56a0c'],
            ['titel'=>'Boschalet','stad'=>'Apeldoorn','prijs'=>110,'slaapkamers'=>2,'bedden'=>4,'badkamers'=>1,'foto'=>'photo-1449844908441-8829872d2607'],
            ['titel'=>'Historisch grachtenpand','stad'=>'Delft','prijs'=>155,'slaapkamers'=>2,'bedden'=>3,'badkamers'=>1,'foto'=>'photo-1600566753086-00f18fb6b3ea'],
            ['titel'=>'Strandhuis','stad'=>'Scheveningen','prijs'=>180,'slaapkamers'=>3,'bedden'=>6,'badkamers'=>2,'foto'=>'photo-1499793983690-e29da59ef1c2'],
            ['titel'=>'Gezellig appartement','stad'=>'Groningen','prijs'=>80,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1600607687939-ce8a6c25118c'],
            ['titel'=>'Ruime woning','stad'=>'Maastricht','prijs'=>130,'slaapkamers'=>2,'bedden'=>4,'badkamers'=>2,'foto'=>'photo-1600573472550-8090b5e0745e'],
            ['titel'=>'Tiny house','stad'=>'Zwolle','prijs'=>70,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1510798831971-661eb04b3739'],
            ['titel'=>'Luxe penthouse','stad'=>'Rotterdam','prijs'=>210,'slaapkamers'=>2,'bedden'=>4,'badkamers'=>2,'foto'=>'photo-1511818966892-d7d671e672a2'],
            ['titel'=>'Groen verblijf','stad'=>'Amersfoort','prijs'=>100,'slaapkamers'=>2,'bedden'=>3,'badkamers'=>1,'foto'=>'photo-1600585152915-d208bec867a1'],
            ['titel'=>'Stadswoning','stad'=>'Leiden','prijs'=>115,'slaapkamers'=>2,'bedden'=>4,'badkamers'=>1,'foto'=>'photo-1554995207-c18c203602cb'],
            ['titel'=>'Romantische suite','stad'=>'Breda','prijs'=>105,'slaapkamers'=>1,'bedden'=>2,'badkamers'=>1,'foto'=>'photo-1615874694520-474822394e73'],
            ['titel'=>'Villa bij de duinen','stad'=>'Noordwijk','prijs'=>230,'slaapkamers'=>4,'bedden'=>7,'badkamers'=>2,'foto'=>'photo-1600047509807-ba8f99d2cdde'],
            ['titel'=>'Comfortabel weekendhuis','stad'=>'Nijmegen','prijs'=>95,'slaapkamers'=>2,'bedden'=>3,'badkamers'=>1,'foto'=>'photo-1600210491892-03d54c0aaf87'],
        ];

        foreach ($properties as $item) {
            Property::create([
                'user_id' => $host->id,
                'titel' => $item['titel'],
                'beschrijving' => 'Een comfortabel verblijf op een fijne locatie. Ideaal voor een weekend weg of een korte vakantie.',
                'stad' => $item['stad'],
                'prijs_per_nacht' => $item['prijs'],
                'aantal_slaapkamers' => $item['slaapkamers'],
                'aantal_bedden' => $item['bedden'],
                'aantal_badkamers' => $item['badkamers'],
                'image_path' => 'https://images.unsplash.com/'.$item['foto'].'?auto=format&fit=crop&w=1200&q=80',
            ]);
        }
    }
}
