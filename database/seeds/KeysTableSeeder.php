<?php

use Illuminate\Database\Seeder;

class KeysTableSeeder extends Seeder
{
    /**
     * @var array Chords.
     */
    public $titles = [
        'C', 'C#',
        'Db', 'D', 'D#',
        'Eb', 'E',
        'F', 'F#',
        'Gb#', 'G', 'G#',
        'Ab', 'A', 'A#',
        'Bb', 'H'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->titles as $title){
            \App\Key::create(['title' => $title]);
        }
    }
}
