<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifs')->insert([
            [
                'name'=>'basic','description'=>'<div>
                <h2>Basic</h2>
                <p>
                  Pellentesque placerat urna id laoreet porta. Sed iaculis libero
                  porttitor orci hendrerit tempor. Vestibulum cursus, sem vitae
                  elementum mattis, libero odio laoreet est, sed hendrerit ligula
                  quam vel purus. Nam odio risus, fermentum sed lectus ac, tempus
                  egestas nulla. Pellentesque pulvinar hendrerit turpis in viverra.
                  Donec sed eros aliquet, blandit nisl in, ultrices leo.
                </p>
                <hr />
                <h4>Advantages</h4>
                <ul>
                  <li>blandit nisl in, ultrices leo.</li>
                  <li>fermentum sed lectus ac.</li>
                  <li>estibulum cursus.</li>
                  <li>donec sed eros aliquet.</li>
                  <li>iaculis libero porttitor orci.</li>
                  <li>pulvinar hendrerit.</li>
                </ul>
                <button>Buy</button>
              </div>', 'price'=>'20BYN/month','picture'=>'basic.jpg', 'status'=>'Ok'
            ],
            [
                'name'=>'standart','description'=>'<h1>Our lessons</h1>
                <p>
                <a href="#"> Link1</a>
                <a href="#"> Link2</a>
                <hr> Standart info
                </p>', 'price'=>'30BYN/month','picture'=>'standart.jpg', 'status'=>'Ok'
            ],
            [
                'name'=>'premium','description'=>'<h1>Our lessons</h1>
                <p>
                <a href="#"> Link1</a>
                <a href="#"> Link2</a>
                <a href="#"> Link3</a>
                <hr> Premium info
                </p>', 'price'=>'40BYN/month','picture'=>'premium.jpg', 'status'=>'Ok'
            ]
        ]);
    }
}
