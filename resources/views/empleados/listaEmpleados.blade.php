

@if($todosLosEmpleados->count() > 0)
        <ul>
            @foreach($todosLosEmpleados as $empleado)
            <li>{{ "id empleado: " .$empleado->id }} </li>
            <li>{{ "Nombre del empleado: " .$empleado->Nombre }}</li>
            <li>{{ "Apellido del empleado : " .$empleado->Apellido}}</li>
            <li>{{ "Fecha de contrato : " .$empleado->created_at}}</li>
            <li>
                <form method="post" action="{{route('borrarEmpleado' , $empleado)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">liminar </button>
                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
                </form>
    


                <form method="post" action="{{route('editarEmpleado' , $empleado)}}">
                     @csrf
                    <input type="text" name="nombre" value="{{ $empleado->nombre}}">
                    <input type="text" name="apellido" value="{{ $empleado->apellido}}">
                    <input type="number" name ="id" value ="{{ $empleado->id }} " hidden>
                    <button type="submit">Editar </button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
        <p> No hay empleados disponibles</p>
        @endif
        <div class="form-group">
        </div>