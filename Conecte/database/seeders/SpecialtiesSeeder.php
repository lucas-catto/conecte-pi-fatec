<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Cuidador domiciliar',
            'Cuidador hospitalar',
            'Cuidador em instituições de longa permanência (ILPI)',
            'Cuidador paliativista',
            'Cuidador para pacientes com Alzheimer',
            'Cuidador para pacientes com Parkinson',
            'Cuidador para idosos com mobilidade reduzida',
            'Cuidador noturno',
            'Cuidador 24 horas',
            'Cuidador de reabilitação pós-cirúrgica',
            'Cuidador especializado em nutrição e alimentação assistida',
            'Cuidador para idosos com deficiência intelectual ou cognitiva',
            'Cuidador de saúde mental',
            'Cuidador gerontológico',
            'Cuidador técnico'
        ];

        foreach ($specialties as $key => $value) {
            Specialty::create([
                'name' => $value
            ]);
        }

        $users = User::where('type', 'caregiver')->get();
        $specialties_size = Specialty::count();

        foreach ($users as $key => $user) {

            for ($i=0; $i < 4; $i++) { 
                $user->specialties->attach(rand(1, $specialties_size));
            }
        }
    }
}
