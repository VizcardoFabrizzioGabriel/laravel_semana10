<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,  // Primero categorías (productos dependen de ellas)
            ProductoSeeder::class,
        ]);
        
        $this->call([
            UserSeeder::class,      // Primero usuarios
            CategoriaSeeder::class,
            ProductoSeeder::class,
         ]);

    }
}
