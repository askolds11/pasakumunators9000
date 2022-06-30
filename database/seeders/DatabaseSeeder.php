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
        $users = User::create([
            'name'=> 'dianataurina',
            'email'=> 'dianataurina@gmail.com',
            'password'=> bcrypt('dianataurina123')
        ]);
        $users = User::create([
            'name'=> 'katarinabush',
            'email'=> 'katarinabush@gmail.com',
            'password'=> bcrypt('katarinabush123')
        ]);
        $users = User::create([
            'name'=> 'lindamaurina',
            'email'=> 'lindamaurina@gmail.com',
            'password'=> bcrypt('lindamaurina123')
        ]);


        //Kategorija

        $kategorija = Kategorija::create([
            'nosaukums'=>'Bokss'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Beisbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Boulings'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Florbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Futbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Galda teniss'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Golfs'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Kartings'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Peintbols'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Skeitbords'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Teniss'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Komandas spele'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Individuala spele'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Iekštelpas'
        ]);
        $kategorija = Kategorija::create([
            'nosaukums'=>'Artelpas'
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

        $pasakums = Pasakums::create([
            'nosaukums'=>'Rigas futbola turnirs',
            'apraksts'=>'Ikgadejais futbola turnirs kas notiek Riga: starp LU un RTU universitatem',
            'datums'=> Carbon::parse('2022-07-06 14:40:00'),
            'norises_ilgums'=>'30',
            'norises_vieta'=>'Kipsalas sporta centra',
            'cena'=>'5.00',
            'veidotajs_id'=>'1',
            'attels_id' => '2'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Olaines Florbola cempionats',
            'apraksts'=>'2022 Olaines Florbola cempionats starp 9-12 klases skoleniem',
            'datums'=> Carbon::parse('2022-09-12 12:00:00'),
            'norises_ilgums'=>'120',
            'norises_vieta'=>'Olaines sporta centra',
            'cena'=>'2.00',
            'veidotajs_id'=>'2',
            'attels_id' => '3'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Jelgavas beisbola sacensibas',
            'apraksts'=>'Atklatas Jelgavas beisbola sacensibas',
            'datums'=>Carbon::parse('2022-11-21 10:30:00'),
            'norises_ilgums'=>'60',
            'norises_vieta'=>'Jelgavas centrala parka',
            'cena'=>'3.00',
            'veidotajs_id'=>'2',
            'attels_id' => '4'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Rigas galda tenisa 2022 atlases spele',
            'apraksts'=>'Rigas 5-17g. jauniešu galda tenisa atlases spele nosledzot 2022 gada seriju',
            'datums'=>Carbon::parse('2022-11-21 15:00:00'),
            'norises_ilgums'=>'40',
            'norises_vieta'=>'VEF kulturas centrs',
            'cena'=>'3.00',
            'veidotajs_id'=>'3',
            'attels_id' => '5'
            ]);
        $pasakums = Pasakums::create([
            'nosaukums'=>'Daugavpls golfa sacensibas',
            'apraksts'=>'Daugavpils sporta pili pilsetas sacensibas golfa ',
            'datums'=>Carbon::parse('2022-12-11 12:30:00'),
            'norises_ilgums'=>'30',
            'norises_vieta'=>'Daugavpls sporta pils',
            'cena'=>'3.00',
            'veidotajs_id'=>'4',
            'attels_id' => '6'
            ]); 
        $pasakums = Pasakums::create([
            'nosaukums'=>'Boulings visiem',
            'apraksts'=>'Boulinga turnirs - Eiropas kvalifikacija',
            'datums'=>Carbon::parse('2023-01-17 11:00:00'),
            'norises_ilgums'=>'90',
            'norises_vieta'=>'Riga, Mezaparka estrade telpas',
            'cena'=>'3.00',
            'veidotajs_id'=>'5',
            'attels_id' => '7'
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
        $komentars = Komentars::create([
            'users_id'=>'4',
            'pasakums_id'=>'4',
            'teksts'=>'Profesionala attieksme pret dalibniekiem un viesiem',
        ]);
        $komentars = Komentars::create([
            'users_id'=>'5',
            'pasakums_id'=>'5',
            'teksts'=>'Katru gadu piedalos - vienmer labakie rezultati',
        ]);
        $komentars = Komentars::create([
            'users_id'=>'2',
            'pasakums_id'=>'2',
            'teksts'=>'Labi',
        ]);
        $komentars = Komentars::create([
            'users_id'=>'3',
            'pasakums_id'=>'3',
            'teksts'=>'Pasākumu organizēšanā ir profesionāla komanda. Esam priecīgi, gandarīti un pateicīgi par sadarbību.',
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
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'4',
            'pasakums_id'=>'4'
        ]);
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'5',
            'pasakums_id'=>'5'
        ]);
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'6',
            'pasakums_id'=>'6'
        ]);
        $lietotajspasakums = LietotajsPasakums::create([
            'users_id'=>'7',
            'pasakums_id'=>'6'
        ]);

        //LietotajsLoma
        ////////user2 - parastais
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'2',
            'loma_id'=>'1'
        ]);
        ////////user3 - parastais + pasakumu_veidotajs
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'3',
            'loma_id'=>'1'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'3',
            'loma_id'=>'2'
        ]);
        ////////////user4 - parastais
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'4',
            'loma_id'=>'1'
        ]);
        //////////user5 - parastais
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'5',
            'loma_id'=>'1'
        ]);
        ////////user6 - parastais + pasakumu_veidotajs
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'6',
            'loma_id'=>'1'
        ]);
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'6',
            'loma_id'=>'2'
        ]);
        /////////////////////////user6 - parastais
        $lietotajsloma = LietotajsLoma::create([
            'users_id'=>'7',
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
            'pasakums_id'=>'1',
            'novertejums'=>'8'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'2',
            'pasakums_id'=>'2',
            'novertejums'=>'7'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'3',
            'pasakums_id'=>'3',
            'novertejums'=>'2'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'4',
            'pasakums_id'=>'4',
            'novertejums'=>'3'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'5',
            'pasakums_id'=>'5',
            'novertejums'=>'6'
        ]);
        $novertejums = Novertejums::create([
            'users_id'=>'6',
            'pasakums_id'=>'6',
            'novertejums'=>'9'
        ]);
        //Attels*****************
        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id' => '1',
            'picture'=> ('images/image_3.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'futbola turnirs',
            'datums'=>Carbon::parse('2022-10-10'),
            'picture'=> ('images/futbols_1.jpg')
        ]);
        $attels = Attels::create([
            'apraksts'=>'Florbola cempionats',
            'datums'=>Carbon::parse('2022-10-12'),
            'picture'=> ('images/florbols_1.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'beisbola sacensibas',
            'datums'=>Carbon::parse('2022-12-22'),
            'picture'=> ('images/beisbols_1.jpg')
        ]);
        $attels = Attels::create([
            'apraksts'=>'galda tenisa 2022 atlases spele',
            'datums'=>Carbon::parse('2022-11-27'),
            'picture'=> ('images/galda_teniss_1.jpg')
        ]);
        $attels = Attels::create([
            'apraksts'=>'golfa sacensibas',
            'datums'=>Carbon::parse('2023-08-15'),
            'picture'=> ('images/golfs.jpg')
        ]);
        $attels = Attels::create([
            'apraksts'=>'boulinga turnirs',
            'datums'=>Carbon::parse('2023-01-12'),
            'picture'=> ('images/bowling_1.JPG')
        ]);

        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id' => '1',
            'picture'=> ('images/t4.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id' => '1',
            'picture'=> ('images/t1.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id' => '2',
            'picture'=> ('images/t2.jpg')
        ]);

        $attels = Attels::create([
            'apraksts'=>'Ooga booga',
            'datums'=>Carbon::parse('2022-12-22'),
            'pasakums_id' => '3',
            'picture'=> ('images/t3.jpg')
        ]);

        //PasakumsKategorija
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'1',
            'kategorija_id'=>'5'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'1',
            'kategorija_id'=>'15'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'1',
            'kategorija_id'=>'12'
        ]);
        ///////////////
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'2',
            'kategorija_id'=>'4'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'2',
            'kategorija_id'=>'14'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'2',
            'kategorija_id'=>'12'
        ]);
        ////////////////////
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'3',
            'kategorija_id'=>'2'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'3',
            'kategorija_id'=>'12'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'3',
            'kategorija_id'=>'15'
        ]);
        ////////////////////////
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'4',
            'kategorija_id'=>'6'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'4',
            'kategorija_id'=>'13'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'4',
            'kategorija_id'=>'14'
        ]);

        //////////////////////
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'5',
            'kategorija_id'=>'7'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'5',
            'kategorija_id'=>'13'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'5',
            'kategorija_id'=>'15'
        ]);


        ////////////////////
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'6',
            'kategorija_id'=>'3'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'6',
            'kategorija_id'=>'13'
        ]);
        $pasakumskategorija = PasakumsKategorija::create([
            'pasakums_id'=>'6',
            'kategorija_id'=>'14'
        ]);



        
        
        
        
        
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
