<?php

use Illuminate\Database\Seeder;
use \DB as DB;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
                
        // echo print_r(DB::select('select VERSION()', [1]), true);
        $faker = Factory::create();

        $entradas = [];
        for ($i=0; $i < 100; $i++) { 
            $entradas[] = [
                'nombre' => strtoupper($faker->word).' Product',
                'palabras_clave' => $faker->word.';'.$faker->word.';'.$faker->word.';',
                'metadatos' => json_encode($faker->words(10)),
                'descripcion' => $faker->text,
                'precio' => $faker->randomFloat(2, 10, 10000),
                'cantidad' => $faker->randomNumber(4),
                'user_id' => $faker->numberBetween(1, 50),
                'image_url' => $faker->imageUrl(200, 200, 'cats', true, 'Faker'),

                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ];
        }
        for ($i=0; $i < 100; $i++) { 
            $entradas[] = [
                'nombre' => strtoupper($faker->word).' Product',
                'palabras_clave' => $faker->word.';'.$faker->word.';'.$faker->word.';',
                'metadatos' => json_encode($faker->words(10)),
                'descripcion' => $faker->text,
                'precio' => $faker->randomFloat(2, 10, 10000),
                'cantidad' => $faker->randomNumber(4),
                'user_id' => $faker->numberBetween(1, 50),
                'image_url' => $faker->imageUrl(200, 200, 'abstract', true, 'Faker'),

                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ];
        }
        // print_r($entradas);

        factory(App\User::class, 50)->create();
        DB::table('entradas')->insert($entradas);
    }
}
