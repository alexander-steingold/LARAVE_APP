<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

    //    Listing::create([
    //         'user_id' => 1, 
    //         'title' => 'Laravel Senior Developer', 
    //         'tags' => 'laravel, javascript',
    //         'company' => 'Acme Corp',
    //         'location' => 'Boston, MA',
    //         'email' => 'email1@email.com',
    //         'website' => 'https://www.acme.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]); 

  
    }
}
