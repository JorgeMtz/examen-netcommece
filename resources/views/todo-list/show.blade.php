@extends('layouts.app')

@section('template_title')
    {{ $todoList->name ?? 'Show Todo List' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Todo List</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('todo-lists.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $todoList->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $todoList->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $todoList->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $todoList->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafin:</strong>
                            {{ $todoList->fechaFin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
