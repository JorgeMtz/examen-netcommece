@extends('layouts.app')

@section('template_title')
    Todo List
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Todo List') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('todo-lists.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Nombre de usuario asignado</th>
										<th>Fecha de inicio</th>
										<th>Fecha de vencimiento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todoLists as $todoList)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $todoList->nombre }}</td>
											<td>{{ $todoList->descripcion }}</td>
											<td>{{ $todoList->user->name }}</td>
											<td>{{ $todoList->fechaInicio }}</td>
											<td>{{ $todoList->fechaFin }}</td>

                                            <td>
                                                <form action="{{ route('todo-lists.destroy',$todoList->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('todo-lists.show',$todoList->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('todo-lists.edit',$todoList->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $todoLists->links() !!}
            </div>
        </div>
    </div>
@endsection
