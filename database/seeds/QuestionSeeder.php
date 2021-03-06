<?php

    use App\Question;
    use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::insert([
            [
                'text' => 'Numa escala de {min} a {max}, como descreve o desempenho do gestor de projecto?',
                'type' => 'range',
                'min' => 0,
                'max' => 10
            ],
            [
                'text' => 'Numa escala de {min} a {max} como descreve o desempenho do account manager no projecto?',
                'type' => 'range',
                'min' => 0,
                'max' => 10
            ],
            [
                'text' => 'Numa escala de {min} a {max}, descreva a sua experiência geral no projecto?',
                'type' => 'range',
                'min' => 0,
                'max' => 10
            ],
            [
                'text' => 'Que melhorias sugeria para o projecto?',
                'type' => 'free',
                'min' => null,
                'max' => null
            ],
            [
                'text' => 'Que melhorias sugeria para a empresa?',
                'type' => 'free',
                'min' => null,
                'max' => null
            ],
        ]);
    }
}
