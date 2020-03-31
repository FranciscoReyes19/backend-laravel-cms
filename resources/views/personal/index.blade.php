@extends('app')


@section('content') 
    <!--<a class="btn btn-success pull-right" href="{{ url('/empleados/create') }}" role="button" disabled>Agregar empleado</a>
    -->
    @include('personal.partials.table')
@endsection

