@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" >

     <div class="col-md-10">
        <table class="table table-striped">
            <thead>
            <tr>
                <th >Premio</th>
                <th >Ganador</th>
                <th >Accion</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($response as $item)
                <tr>
                    <td><img src="{{ $item['image'] }}" style=" border-radius: 50%; width: 30px;" ></td>
                    @if(  $item['prize'] == null )
                        <td> No asignado </td>
                        <td>
                            <button type="button" class="btn btn-primary" onClick="create('{{ $item['id'] }}')">
                                Asignar
                            </button>
                        </td>
                    @else
                        <td>{{$item['prize']->name }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onClick="edit('{{ $item['prize']->id }}')" >Editar</button>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
       </div>
    </div>
    @include('prize.modal')

@endsection
