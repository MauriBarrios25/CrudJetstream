<x-slot name="header">
    <h1 class="text-gray-900">Alumnos</h1>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        

    {{-- Stop trying to control. --}}
        <button wire:click="crear()" class="bg-blue-500 hover:bg-blue-600 rounded-md border text-black font-bold py-2 px-4">Crear</button>
        @if($modal)
            @include('livewire.crear')   
        @endif    

        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">Id</th>
                <th class="px-4 py-2">Nombres</th>
                <th class="px-4 py-2">Apellidos</th>
                <th class="px-4 py-2">Edad</th>
                <th class="px-4 py-2">Sexo</th>
                <th class="px-4 py-2">Cum</th>
                <th class="px-4 py-2">Editar</th>
                <th class="px-4 py-2">Borrar</th>
            </tr>
 
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td class="border px-4 py-2">{{ $alumno->id }}</td>
                <td class="border px-4 py-2">{{ $alumno->nombres }}</td>
                <td class="border px-4 py-2">{{ $alumno->apellidos }}</td>
                <td class="border px-4 py-2">{{ $alumno->edad }}</td>
                <td class="border px-4 py-2">{{ $alumno->sexo }}</td>
                <td class="border px-4 py-2">{{ $alumno->cum }} </td>
                <td class="border px-4 py-2"><button wire:click="editar({{$alumno->id}})" class="bg-blue-500 hover:bg-blue-600 rounded-md border text-black font-bold py-2 px-4">Editar</button></td>
                <td class="border px-4 py-2"><button wire:click="borrar({{$alumno->id}})" class="bg-red-500 hover:bg-red-700 rounded-md border text-black font-bold py-2 px-4">Borrar</button></td>
            </tr>


         @endforeach


        </tbody>


        </table>
        </div>
    </div>
</div>
