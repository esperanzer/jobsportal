<?php

namespace Database\Seeders;
// import List ing class
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        //create user variable
        $user= User::factory()->create([
            //include all necessary fields you want in this array
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'tittle' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'desscription' => 'Lorem ipsum dolor sit amet 
        //     consectetur adipisicing elit. Ipsam minima et
        //      illo reprehenderit quas possimus voluptas 
        //      repudiandae cum expedita, eveniet aliquid,
        //       quam illum quaerat consequatur! Expedita 
        //       ab consectetur tenetur delensiti?'


        // ]);

        // my question is why is it picking on ly 2 records for listing table in the db
        // Listing::create([
        //     'tittle' => 'Full Stack Engineer', 
        //     'tags' => 'API, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'desscription' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo 
        //     reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam  illum quaerat consequatur!
        //      Expedita ab consectetur tenetur delensiti?'

        // ]);


    }

}
        // import Listing model and use create method
        // Listing::create([
        //     'tittle' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'campany' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     // 'website' => 'https://www.acme.com',
        //     'desscription' => 'Lorem ipsum dolor sit amet 
        //     consectetur adipisicing elit. Ipsam minima et
        //      illo reprehenderit quas possimus voluptas 
        //      repudiandae cum expedita, eveniet aliquid,
        //       quam illum quaerat consequatur! Expedita 
        //       ab consectetur tenetur delensiti?'
        // ]);

        
        // Listing::create([
        //     'tittle' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        // ]);
        

        
    
