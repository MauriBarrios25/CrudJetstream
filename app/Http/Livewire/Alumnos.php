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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = 
        [
            'nombres' => 'required',
            'apellidos'=> 'required',
            'edad' => 'required | gt:0' ,
            'sexo' => 'required' ,
            'cum' => 'required | numeric | between:0,10',   
         ];

         protected $messages = [
            'nombres.required' => 'El campo nombres es requerido.',
            'apellidos.required' => 'El campo apellidos es requerido.',
            'edad.required' => 'El campo edad es requerido.',
            'edad.gt' => 'La edad debe ser mayor a 0.',
            'sexo.required' => 'El campo sexo es requerido.',
            'cum.required' => 'El campo cum es requerido.',
            'cum.between' => 'La cantidad ingresada debe estar entre 0 y 10',
        ];

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
        $this->nombres = '';
        $this->apellidos = '';
        $this->edad = '';
        $this->sexo = '';
        $this->cum = '';
        $this->id_alumno = '';
    }
    public function editar($id)
    {
        $alumnos = alumno::findOrFail($id);
        $this->id_alumno = $id;
        $this->nombres = $alumnos->nombres;
        $this->apellidos = $alumnos->apellidos;
        $this->edad = $alumnos->edad;
        $this->sexo = $alumnos->sexo;
        $this->cum = $alumnos->cum;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        alumno::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {

       
        $this->validate();
        alumno::updateOrCreate(['id'=>$this->id_alumno],
            
                 [
                    'nombres' => $this->nombres,
                    'apellidos' => $this->apellidos,
                    'edad'=> $this->edad,
                    'sexo'=> $this->sexo,
                    'cum'=> $this->cum,

                 ]);
            
                
            
        
    
            
         
         session()->flash('message',
            $this->id_alumno ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
                
            
    }
}
