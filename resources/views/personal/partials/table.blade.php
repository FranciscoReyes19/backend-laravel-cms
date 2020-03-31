
<h1 class="text-primary">Personal Admin</h1>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <!--<th class="text-center">Clave</th>-->
        <th class="text-center">Nombre</th>
        <th class="text-center">Email</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{ $user->name }}</td>
            <td class="text-center">{{ $user->email }}</td>
                
            <td class="text-center">
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
               <a class="btn btn-info btn-s" data-toggle="modal" data-target="#modal{{$user->id}}">Editar
                </a>
                
                <div class="modal" id="modal{{$user->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Editar: {{ $user->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!--CONTENT SUPERPONE EL CIERTO CONTENIDO -->
                        {!! Form::model($user, [ 'route' => ['personal.update', $user->id], 'method' => 'PUT']) !!}
                        <br/>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre', ['for' => 'name'] ) !!}
                            {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => $user->name, 'required' ]  ) !!}
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::label('email', 'Correo', ['for' => 'email'] ) !!}
                            {!! Form::text('email', null , ['class' => 'form-control', 'id' => 'email', 'placeholder' => $user->email, 'required' ]  ) !!}
                        </div>
                      </div>
                      <div class="modal-footer">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <a href="#" class="btn btn-warning btn-s">
                    Mostrar
                </a>
            </td>

        {!! Form::close() !!}

        </tr>
    @endforeach
    <tfoot>
    <tr>
        <th class="text-center">Nombre</th>
        <th class="text-center">Email</th>
        <th class="text-center">Acciones</th>
    </tr>
  </tfoot>
  </tbody>
</table>