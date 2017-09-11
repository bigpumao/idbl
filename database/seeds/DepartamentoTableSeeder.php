<?php

use Illuminate\Database\Seeder;
use App\Model\Departamento\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Mulheres',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Homens',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Jeans',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Teens',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Kids',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Rede de Células',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Treinamento de Líderes de Células (TLC)',
            ]

        );
        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'reinamento Avançado de Líderes (TADEL)',
            ]

        );

        Departamento::create(
            [
                'user_id'       =>      1,
                'departamento'  =>      'Escola Bíblica de Dominical (EBD)',
            ]

        );
    }
}
