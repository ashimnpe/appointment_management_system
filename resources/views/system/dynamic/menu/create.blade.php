@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header p-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12  mx-auto ">
                        <h1>Create Menu</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card w-50 mx-auto">
                    <div class="card-header bg-info">
                        Dynamic Menu
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'menu.store', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Menu Name']) !!}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('order', 'Display Order') !!}
                                    {!! Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Display Order']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('type', 'Type') !!}
                                    {!! Form::select('type', config('dropdown.menuType'), null, [
                                        'id' => 'type',
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Type',
                                        'onchange' => 'toggleFields()',]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="form1" style="display: none">
                                    {!! Form::label('module_id', 'Modules') !!}
                                    {!! Form::select('module_id', $modules->pluck('name', 'id'), null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Module',
                                    ]) !!}
                                </div>
                                <div class="form-group" id="form2" style="display: none">
                                    {!! Form::label('page_id', 'Pages') !!}
                                    {!! Form::select('page_id', $pages->pluck('slug', 'id'), null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Pages',
                                    ]) !!}
                                </div>
                                <div class="form-group" id="form3" style="display: none">
                                    {!! Form::label('external link', 'External Links') !!}
                                    {!! Form::text('external_link', '', ['class' => 'form-control', 'placeholder' => 'Enter External Link']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    Active {!! Form::radio('status', config('radio.statusType.active'), null, ['class' => '']) !!}
                                    Inactive {!! Form::radio('status', config('radio.statusType.inactive'), null, ['class' => '']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success btn-sm">Create</button>
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
        </section>
    </div>
@endsection
