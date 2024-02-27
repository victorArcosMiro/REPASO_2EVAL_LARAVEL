@extends("master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("main_title", "Listado de empleados")

@section("content")
    <table class='sinbordes'>
        <tr>
            <th>Nombre</th><th>Apellidos</th><th>Departamento</th><th>Funciones</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>

    @foreach ($employeeList as $employee)
        <tr>
            <td class="hover"><a href="{{route('employee.show', $employee->id)}}" class="block">{{$employee->name}}</a></td>
            <td>{{$employee->surname}}</td>
            <td class='derecha'>{{$employee->department}}</td>
            <td class='derecha'>{{$employee->functions}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('employee.edit', $employee->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('employee.destroy', $employee->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('employee.create') }}">Nuevo Empleado</a>

    <br><br>
    <form action = "{{route('menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
@endsection