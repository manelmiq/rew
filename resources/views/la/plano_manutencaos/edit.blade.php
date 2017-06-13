@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/plano_manutencaos') }}">Plano manutencao</a> :
@endsection
@section("contentheader_description", $plano_manutencao->$view_col)
@section("section", "Plano manutencaos")
@section("section_url", url(config('laraadmin.adminRoute') . '/plano_manutencaos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Plano manutencaos Edit : ".$plano_manutencao->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($plano_manutencao, ['route' => [config('laraadmin.adminRoute') . '.plano_manutencaos.update', $plano_manutencao->id ], 'method'=>'PUT', 'id' => 'plano_manutencao-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'codigo')
					@la_input($module, 'descricao')
					@la_input($module, 'tipo_manutenção')
					@la_input($module, 'prioridade')
					@la_input($module, 'ativo')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/plano_manutencaos') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#plano_manutencao-edit-form").validate({
		
	});
});
</script>
@endpush
