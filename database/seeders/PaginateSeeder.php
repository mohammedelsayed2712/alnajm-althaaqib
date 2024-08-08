<?php

namespace Database\Seeders;

use App\Models\Paginate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class PaginateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i=1; $i<=100; $i++){
        //     Paginate::create([
        //         'image_path' => 'uploads/photos/CFQuZp9E6bVLPFi8rGOSrwHEqQ7IkzGijYwD8Tlr.png',
        //     ]);
        // }
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            // Generate a random title and description
            $title = $faker->sentence(3);
            $description = $faker->paragraph(2);

            // Create a dummy image for each record
            $imagePath = 'uploads/images/photo_' . $i . '.jpg';
            Storage::disk('public')->put($imagePath, file_get_contents($faker->image(null, 640, 480, null, true, true, null, false)));

            // Create the photo record in the database
            Paginate::create([
                'image_path' => $imagePath,
            ]);
    }
}
}