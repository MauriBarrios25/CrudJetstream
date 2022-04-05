<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;

class Alumnos extends Component
{
    public $alumnos,$nombres,$apellidos,$edad,$sexo,$cum,$id_alumno;
    public $modal = false;
    public function render()
    {
        $this->alumnos = Alumno::all();
        return view('livewire.alumnos');
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->descripcion = '';
        $this->cantidad = '';
        $this->id_alumno = '';
    }
    public function editar($id)
    {
        $alumnos = alumno::findOrFail($id);
        $this->id_alumno = $id;
        $this->descripcion = $alumnos->descripcion;
        $this->cantidad = $alumnos->cantidad;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        alumno::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        alumno::updateOrCreate(['id'=>$this->id_alumno],
            [
                'descripcion' => $this->descripcion,
                'cantidad' => $this->cantidad
            ]);
         
         session()->flash('message',
            $this->id_alumno ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
