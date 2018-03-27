@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">La Comunidad</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'member.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', '', ['required','class' => 'form-control']) !!}
                    </div>
                    <button class="btn btn-success" type="submit">Añadir miembro</button>
                    {!! Form::close() !!}       
                    <hr>
                    <table class="table">
                    <thead>
                        <th colspan=2>Nombre</th>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td class="text-right">
                                <button class="btn btn-primary btn-sm" onClick="openEditor('{{$member->name}}',{{$member->id}})"><i class="far fa-edit"></i></button>
                                {!! Form::open(['class'=>'d-inline-block', 'route' => ['member.destroy',$member->id],'method'=>'DELETE']) !!}
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}         
                            </td>
                        </tr>
                    @endforeach
                    </tbody>       
                    </table>
                </div>    
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="editor">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        {!! Form::open(['id'=>"editor-form" ,'method'=>'PUT', 'route' => ['member.update','id'=>'0']]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', '', ['id'=>"editor-name", 'class' => 'form-control']) !!} 
                {!! Form::hidden('id', '', ['id'=>"editor-id", 'class' => 'form-control']) !!} 
            </div>
            <button class="btn btn-success btn-sm" type="submit">Guardar</button>
        {!! Form::close() !!}  
      </div> 
    </div>
  </div>
</div>
<script>
    function openEditor(name,id){
        $("#editor").modal('show');
        $('#editor-name').val(name); 
        $('#editor-id').val(id);         
    }
</script>
@endsection
