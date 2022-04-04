<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;

class Alumnos extends Component
{
    public $alumnos;

    public function render()
    {
        $this->alumnos = Alumno::all();
        return view('livewire.alumnos');
    }
}
