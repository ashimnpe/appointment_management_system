@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header p-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12  mx-auto ">
                        <h1>Edit Menu</h1>
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
                        {!! Form::open(['route' => ['menu.update', $menus->id], 'method' => 'put']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', $menus->name, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('order', 'Display Order') !!}
                                    {!! Form::number('order', $menus->order, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('type', 'Type') !!}
                                    {!! Form::select('type', config('dropdown.menuType'), isset($menus) ? $menus->type : null, [
                                        'id' => 'type',
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Type',
                                        'onchange' => 'toggleFields()',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="form1" style="display: {!! isset($menus) && $menus->type == '1' ? 'block' : 'none' !!}">
                                    {!! Form::label('module_id', 'Modules') !!}
                                    {!! Form::select('module_id', $modules->pluck('name', 'id'), isset($menus) ? $menus->module_id : null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Module',
                                    ]) !!}
                                </div>
                                <div class="form-group" id="form2" style="display: {!! isset($menus) && $menus->type == '2' ? 'block' : 'none' !!}">
                                    {!! Form::label('page_id', 'Pages') !!}
                                    {!! Form::select('page_id', $pages->pluck('title.en', 'id'), isset($menus) ? $menus->page_id : null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Pages',
                                    ]) !!}
                                </div>
                                <div class="form-group" id="form3" style="display: {!! isset($menus) && $menus->type == '3' ? 'block' : 'none' !!}">
                                    {!! Form::label('external_link', 'External Links') !!}
                                    {!! Form::text('external_link', isset($menus) ? $menus->external_link : null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter External Link',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    @if ($menus->status == '1')
                                        Active {!! Form::radio('status',config('radio.statusType.active'),$menus->status === config('radio.statusType.active'),['checked'],) !!}
                                        Inactive {!! Form::radio('status',config('radio.statusType.inactive'),$menus->status === config('radio.statusType.inactive'),[''],) !!}
                                    @else
                                        Active {!! Form::radio('status',config('radio.statusType.active'),$menus->status === config('radio.statusType.active'),[''],) !!}
                                        Inactive {!! Form::radio('status',config('radio.statusType.inactive'),$menus->status === config('radio.statusType.inactive'),['checked'],) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
