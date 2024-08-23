@extends('panel.layouts.simple.master')
@section('title', 'Module Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Supplier')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Supplier')}}</li>
{{-- <li class="breadcrumb-item active">{{__('Create')}} {{__('Supplier')}}</li> --}}
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('supplier.create') }}">{{__('here.')}}</a></h4>
    @if ($suppliers !== null && $suppliers->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Address')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($suppliers as $supplier)

                    <th>{{ $supplier->id }}</th>
                    @if($supplier->name)
                    <th>{{ $supplier->name }}</th>
                    @else
                    <th>-</th>
                    @endif

                     @if($supplier->address)
                    <th>{{ $supplier->address }}</th>
                    @else
                    <th>-</th>
                    @endif

                    
                    <th class="counter"><a href="{{ route('supplier.edit', $supplier->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('supplier.show', $supplier->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de modulo?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span>
                    </th>
                </tr>
                     @endforeach
                
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron proveedores</p>
    @endif

</div>
@endsection

@section('script')
@endsection