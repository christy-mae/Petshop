<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pet::create([
            'name' => 'Golden Retriever',
            'description' => 'Friendly and intelligent dog.',
            'image_url' => 'goldendog.jpg',
            'price' => 500.00,
        ]);

        Pet::create([
            'name' => 'Persian Cat',
            'description' => 'Beautiful and fluffy cat.',
            'image_url' => 'persiancat.jpg',
            'price' => 300.00,
        ]);

        Pet::create([
            'name' => 'Parrot',
            'description' => 'Colorful and talkative bird.',
            'image_url' => 'parrot.jpg',
            'price' => 200.00,
        ]);

        Pet::create([
            'name' => 'Siberian Husky',
            'description' => 'Energetic and playful dog breed.',
            'image_url' => 'siberianhusky.jpg',
            'price' => 600.00,
        ]);

        Pet::create([
            'name' => 'Bengal Cat',
            'description' => 'Wild and beautiful cat breed.',
            'image_url' => 'bengalcat.jpg',
            'price' => 400.00,
        ]);

        Pet::create([
            'name' => 'Lovebird',
            'description' => 'Small and affectionate bird.',
            'image_url' => 'lovebird.jpg',
            'price' => 150.00,
        ]);

        Pet::create([
            'name' => 'Bearded Dragon',
            'description' => 'Calm and easy to handle reptile.',
            'image_url' => 'beardeddragon.jpg',
            'price' => 100.00,
        ]);

        Pet::create([
            'name' => 'Golden Hamster',
            'description' => 'Small and playful rodent.',
            'image_url' => 'goldenhamster.jpg',
            'price' => 20.00,
        ]);

        Pet::create([
            'name' => 'African Grey Parrot',
            'description' => 'Highly intelligent and vocal bird.',
            'image_url' => 'africangreyparrot.jpg',
            'price' => 700.00,
        ]);

        Pet::create([
            'name' => 'Miniature Schnauzer',
            'description' => 'Compact and alert dog breed.',
            'image_url' => 'miniatureschnauzer.jpg',
            'price' => 400.00,
        ]);
    }
}
