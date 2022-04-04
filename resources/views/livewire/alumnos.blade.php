<div>
    {{-- Stop trying to control. --}}

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Cum</th>
            </tr>

        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->nombres }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->edad }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->cum }} </td>
            </tr>


         @endforeach


        </tbody>



    </table>

</div>
