<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $umkms = [
            ['Jus Buah dan Cilok', 'Makanan dan Minuman', 'Leni Suyanti', 'Jl. Ledok Dowo RT 02 RW 04, Ds. Pakisjajar, Kec. Pakis', '6283846404523', '62881026147938','lenisuyanti04@gmail.com',null],
            ['Warung P. Ali', 'Makanan dan Minuman', 'Pak Ali', 'Jl. Ledok Dowo RT 02 RW 04, Ds. Pakisjajar, Kec. Pakis', '628819591748','628819591748','pak.ali@desawisatapakisjajar.com',null],
            ['Warung Bu Astutik', 'Makanan dan Minuman', 'Astutik', 'Jl. Ledok Dowo RT 02 RW 04, Ds. Pakis, Kec. Pakis', '62895335237362', '62895335237362','astutik@desawisatapakisjajar.com', null],
            ['Warung Bu Ratih', 'Makanan dan Minuman', 'Ratih Iga Mawarni', 'Jl. Ledok Dowo RT 02 RW 04, Ds. Pakis, Kec. Pakis', '62895331103176', '62895331103176', 'ratih.iga.mawarni@desawisatapakisjajar.com',null],
            ['Cuci Motor dan Karpet Pak Ardi', 'Cuci Motor dan Karpet', 'M. Ardi Nuggroho', 'Jl. Raya Ledok Dowo, RT 02, RW 04, Ds. Pakisjajar, Kec. Pakis', '6282228648581', '6282228648581','m.ardi.nuggroho@desawisatapakisjajar.com',null],
            ['Warung Bu Muliana', 'Makanan dan Minuman', 'Muliana', 'Jl. Ledok Dowo, RT 02, RW 04, Ds. Pakisjajar, Kec. Pakis', '6282232600229', '6282232600229', 'mulianamlg@gmail.com', null],
            ['Toko', 'Makanan dan Minuman', 'Silvia Damayanti', 'Jl. Ledok Dowo Gg. 3 RT 02 RW 04, Ds. Pakisjajar, Kec. Pakis', '62895424814020', '62895424814020', 'silvia.damayanti@desawisatapakisjajar.com',null],
            ['Cilok Pak Khusnul', 'Jualan Cilok', 'Khusnul Hakim', 'Dsn. Krajan RT 02 RW 04, Ds. Pakisjajar, Kec. Pakis', '6289652943246', '6290652943246', 'khusnul.hakim@desawisatapakisjajar.com',null],

        ];

        $created = 0;

        collect($umkms)
            ->each(function($umkm) use (&$created){

                if (User::where('email', $umkm[6])->exists()) return;

                $user = User::create([
                    'name' => $umkm[2],
                    'email' => $umkm[6],
                    'password' => Hash::make('pakisjajar123'),
                ]);

                Umkm::create([
                    'name' => $umkm[0],
                    'jenis_usaha' => $umkm[1],
                    'address' => $umkm[3],
                    'phone' => $umkm[4],
                    'whatsapp' => $umkm[5],
                    'ig' => $umkm[7],
                    'owner_id' => $user->id,
                ]);

                $created++;
            });

        $this->command->info("$created umkms created, " . count($umkms) - $created . " skipped.");
    }
}
