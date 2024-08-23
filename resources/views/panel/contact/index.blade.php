@extends('panel.layouts.simple.master')
@section('title', 'Staff Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Contacts')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Contacts')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Contacts')}}</li>
@endsection

@section('content')
<div class="container-fluid">
   
    @if ($contacts !== null && $contacts->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Lastname')}}:</th>
                    <th>{{__('Email')}}:</th>
                    <th>{{__('Phone')}}:</th>
                    <th>{{__('Company')}}:</th>
                    <th>{{__('Country')}}:</th>
                    <th>{{__('Comment')}}:</th>
                    <th>{{__('Cases')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($contacts as $contact)
                    <th>{{ $contact->id }}</th>

                    @if($contact->name)
                    <th>{{ $contact->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    @if($contact->lastname)
                    <th>{{ $contact->lastname }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    @if($contact->email)
                    <th>{{ $contact->email }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    @if($contact->phone)
                    <th>{{ $contact->phone }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    @if($contact->company)
                    <th>{{ $contact->company }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    <th>
                        @if($contact->country)
                            <span class="badge badge-primary">{{ $contact->country }}</span>
                        @else
                            {{__('No Data')}}
                        @endif
                    </th>

                     @if($contact->comments)
                    <th>{{ $contact->comments }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                     @if($contact->project_type_id)
                    <th>{{App\Models\ProjectType::find($contact->project_type_id)->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                  
                    <th class="counter"><a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta data?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron contactos</p>
    @endif

</div>
@endsection

@section('script')
@endsection