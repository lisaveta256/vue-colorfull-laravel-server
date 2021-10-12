<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InfoTarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_tarifs')->insert([
            [
                'tarif_id'=>'7','short_description'=>'<div>
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
              </div>', 'perks'=>'20BYN/month','links'=>'basic.jpg', 'status'=>'Ok'
            ],
            [
                'tarif_id'=>'8','short_description'=>'<h1>Our lessons</h1>
                <p>
                <a href="#"> Link1</a>
                <a href="#"> Link2</a>
                <hr> Standart info
                </p>', 'perks'=>'30BYN/month','links'=>'standart.jpg', 'status'=>'Ok'
            ],
            [
                'tarif_id'=>'9','short_description'=>'<h1>Our lessons</h1>
                <p>
                <a href="#"> Link1</a>
                <a href="#"> Link2</a>
                <a href="#"> Link3</a>
                <hr> Premium info
                </p>', 'perks'=>'40BYN/month','links'=>'premium.jpg', 'status'=>'Ok'
            ]
        ]);
    }
}
