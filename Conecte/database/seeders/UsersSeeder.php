<?php

namespace Database\Seeders;

use App\Models\Caregiver;
use App\Models\Contractor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 5; $i++) { 

            $user = User::create([
                'name' => $faker->userName(),
                'cpf'  => $this->cpf(),
                'email' => $faker->unique()->email,
                'password' => Hash::make('senha123')
            ]);

            Contractor::create([
                'user_id' => $user->id
            ]);
        }

        for ($i=0; $i < 5; $i++) { 

            $user = User::create([
                'name' => $faker->userName(),
                'cpf'  => $this->cpf(),
                'email' => $faker->unique()->email,
                'password' => Hash::make('senha123')
            ]);

            Caregiver::create([
                'user_id' => $user->id
            ]);
        }
    }

    private function cpf()
    {
        // Gera os 9 primeiros dígitos aleatórios
        $numeroBase = '';
        for ($i = 0; $i < 9; $i++) {
            $numeroBase .= rand(0, 9);
        }
    
        // Calcula o primeiro dígito verificador
        $soma1 = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma1 += (int) $numeroBase[$i] * (10 - $i);
        }
        $digito1 = 11 - ($soma1 % 11);
        if ($digito1 >= 10) $digito1 = 0;
    
        // Calcula o segundo dígito verificador
        $soma2 = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma2 += (int) $numeroBase[$i] * (11 - $i);
        }
        $soma2 += $digito1 * 2;
        $digito2 = 11 - ($soma2 % 11);
        if ($digito2 >= 10) $digito2 = 0;
    
        // Cria o CPF completo
        $cpfCompleto = $numeroBase . $digito1 . $digito2;
    
        // Retorna o CPF formatado XXX.XXX.XXX-XX
        return substr($cpfCompleto, 0, 3) . '.' . substr($cpfCompleto, 3, 3) . '.' . substr($cpfCompleto, 6, 3) . '-' . substr($cpfCompleto, 9, 2);
    }
    
}
