<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Producto::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $productos = [

            ['nombre'=>'Laptop Thinkpad X1',            'marca'=>'Lenovo',      'precio'=>2500.00,'stock'=>10,'id_categoria'=>1,'foto'=>'laptop-thinkpad.jpg'],
            ['nombre'=>'Audifonos Free Clip',           'marca'=>'Huawei',    'precio'=> 120.50,'stock'=>25,'id_categoria'=>1,'foto'=>'audifonos-huawei.jpg'],
            ['nombre'=>'Teclado Mecanico',              'marca'=>'Corne','precio'=> 189.90,'stock'=>15,'id_categoria'=>1,'foto'=>'teclado-cornev4.jpg'],
            ['nombre'=>'Polo Casual',                   'marca'=>'Catsstac',  'precio'=>  45.00,'stock'=>50,'id_categoria'=>2,'foto'=>'polo-catsstac.jpg'],
            ['nombre'=>'Gorra balaclava Casual',        'marca'=>'Oakley',    'precio'=>  35.00,'stock'=>30,'id_categoria'=>2,'foto'=>'gorra-oakley.jpg'],
            ['nombre'=>'Cafe Organico 250g',            'marca'=>'Nescafe','precio'=>  18.90,'stock'=>100,'id_categoria'=>3,'foto'=>'cafe-nescafe.jpg'],
            ['nombre'=>'Avena Quaker',                  'marca'=>'Quaker','precio'=>   8.50,'stock'=>80,'id_categoria'=>3,'foto'=>'avena.jpg'],
            ['nombre'=>'Lampara LED',                   'marca'=>'Philips', 'precio'=>  55.00,'stock'=>20,'id_categoria'=>4,'foto'=>'lampara.jpg'],
            ['nombre'=>'Pelota de Futbol Red Star',     'marca'=>'Mikasa',  'precio'=>  79.00,'stock'=>40,'id_categoria'=>5,'foto'=>'pelota.jpg'],


        ];

        foreach ($productos as $prod) {
            Producto::create($prod);
        }

        $this->command->info('✔ Productos insertados: ' . count($productos));
    }
}