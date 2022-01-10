<?php

use Illuminate\Database\Seeder;

class dd_coef_fixes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dd_coef_fixes')->insert([
            'coef_prix_par_gramme' => '0.003',
            'coef_frais_transit_certif_euro1' => '250',
            'coef_frais_pallete_contenaire_20pieds' => '1500',
            'coef_frais_pallete_contenaire_40pieds' => '2300',
            'coef_frais_pallete_contenaire_40piedsHQ' => '2500',
            // 'coef_prix_par_gramme' => Str::random(10),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),
        ]);

        //
       
    }
}
