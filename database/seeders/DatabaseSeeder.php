<?php

namespace Database\Seeders;

use App\Models\Attels;
use App\Models\Kategorija;
use App\Models\Komentars;
use App\Models\LietotajsLoma;
use App\Models\LietotajsPasakums;
use App\Models\Loma;
use App\Models\Novertejums;
use App\Models\Pasakums;
use App\Models\PasakumsKategorija;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        //User
        $users = User::create([
            'name'=> 'admin',
            'email'=> 'admin@admin.admin',
            'password'=> bcrypt('admin')
        ]);

        $users = User::create([
            'name'=> 'janisrainis',
            'email'=> 'janisrainis@gmail.com',
            'password'=> bcrypt('janisrainis123')
        ]);
            
        $users = User::create([
            'name'=> 'oskarslicitis',
            'email'=> 'oskarslicitis@gmail.com',
            'password'=> bcrypt('oskarslicitis123')
        ]);
            
        $users = User::create([
            'name'=> 'maijaliepa',
            'email'=> 'maijaliepa@gmail.com',
            'password'=> bcrypt('maijaliepa123')
        ]);

        //Kategorija

        $kategorija = Kategorija::create([
            'nosaukums'=>'futbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'basketbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'volejbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'peldesana'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'florbols'
        ]);
        
        //Loma
        $loma = Loma::create([
            'nosaukums'=>'lietotajs'
        ]);
        $loma = Loma::create([
            'nosaukums'=>'pasakumu_veidotajs'
        ]);
        $loma = Loma::create([
            'nosaukums'=>'administrators'
        ]);

        //Pasakums

        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'picture'=> ('public/images/image_3.jpg')
        ]);

        $pasakums = Pasakums::create([
            'nosaukums'=>'Rigas futbola turnirs',
            'apraksts'=>'Ikgadejais futbola ternirs ks notiek Riga start LU un RTU universitatem',
            'datums'=> Carbon::parse('2022-07-06 14:40:00'),
            'norises_ilgums'=>'30',
            'norises_vieta'=>'Kipsalas sporta centra',
            'cena'=>'5.00',
            'veidotajs_id'=>'1',
            'attels_id' => '1'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Olaines basketbola cempionats',
            'apraksts'=>'2022 Olaines basketbola cempionts start 9-12 klases skoleniem',
            'datums'=> Carbon::parse('2022-09-12 12:00:00'),
            'norises_ilgums'=>'120',
            'norises_vieta'=>'Olaines sporta centra',
            'cena'=>'2.00',
            'veidotajs_id'=>'2',
            'attels_id' => '1'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Jelgavas peldesanas sacensibas',
            'apraksts'=>'Atklatas Jelgavas peldesanas sacensibas',
            'datums'=>Carbon::parse('2022-11-21 10:30:00'),
            'norises_ilgums'=>'60',
            'norises_vieta'=>'Jelgavas baseins',
            'cena'=>'3.00',
            'veidotajs_id'=>'2',
            'attels_id' => '1'
            ]);

            //Komentars
        $komentars = Komentars::create([
            'users_id'=>'1',
            'pasakums_id'=>'1',
            'teksts'=>'Paldies',
            //'datums'=>Carbon::parse('2022-07-09')
        ]);
        $komentars = Komentars::create([
            'users_id'=>'2',
            'pasakums_id'=>'2',
            'teksts'=>'Bija loti interesanti',
            //'datums'=>Carbon::parse('2022-10-12')
        ]);
        $komentars = Komentars::create([
            'users_id'=>'3',
            'pasakums_id'=>'3',
            'teksts'=>'Slikta edinasana',
            //'datums'=>Carbon::parse('2022-12-12')
        ]);

        //LietotajsPasakums
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'1',
            'pasakums_id'=>'1'
        ]);
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'2',
            'pasakums_id'=>'2'
        ]);
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'3',
            'pasakums_id'=>'3'
        ]);

        //LietotajsLoma
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'2',
            'loma_id'=>'1'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'1',
            'loma_id'=>'2'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'3',
            'loma_id'=>'1'
        ]);

        //admin
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'1',
            'loma_id'=>'1'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'1',
            'loma_id'=>'2'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'1',
            'loma_id'=>'3'
        ]);
        
        //Novertejums
        $novertejums = Novertejums::create([
            'users_id'=>'1',
            'pasakums_id'=>'3',
            'novertejums'=>'8'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'2',
            'pasakums_id'=>'1',
            'novertejums'=>'7'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'3',
            'pasakums_id'=>'1',
            'novertejums'=>'2'
        ]);
        //Attels
        $attels = Attels::create([
            'apraksts'=>'Bilde no Lienes',
            'datums'=>Carbon::parse('2022-10-10'),
            'pasakums_id'=>'1',
            'picture'=> ('public/images/image_1.jpg')
        ]);
        $attels = Attels::create([
            'apraksts'=>'Interesanti',
            'datums'=>Carbon::parse('2022-10-12'),
            'pasakums_id'=>'2',
            'picture'=> ('public/images/image_2.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'Es un mani draugi',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id'=>'3',
            'picture'=> ('public/images/image_3.jpg')
        ]);

        //PasakumsKategorija
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'1',
            'kategorija_id'=>'2'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'2',
            'kategorija_id'=>'3'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'3',
            'kategorija_id'=>'1'
        ]);


        
        
        
        
        
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
