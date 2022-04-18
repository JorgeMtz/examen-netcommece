@extends('layouts.app')

@section('template_title')
    Create Todo List
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar a la lista</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('todo-lists.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('todo-list.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
