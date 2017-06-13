@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/manuntencaos') }}">Manuntencao</a> :
@endsection
@section("contentheader_description", $manuntencao->$view_col)
@section("section", "Manuntencaos")
@section("section_url", url(config('laraadmin.adminRoute') . '/manuntencaos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Manuntencaos Edit : ".$manuntencao->$view_col)

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
				{!! Form::model($manuntencao, ['route' => [config('laraadmin.adminRoute') . '.manuntencaos.update', $manuntencao->id ], 'method'=>'PUT', 'id' => 'manuntencao-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'Codigo')
					@la_input($module, 'descricao')
					@la_input($module, 'centro_custo')
					@la_input($module, 'tipo_equipamento')
					@la_input($module, 'modelo')
					@la_input($module, 'fabricante')
					@la_input($module, 'fornecedor')
					@la_input($module, 'Valor de Compra')
					@la_input($module, 'valor_venda')
					@la_input($module, 'data_compra')
					@la_input($module, 'data_venda')
					@la_input($module, 'ativo')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/manuntencaos') }}">Cancel</a></button>
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
	$("#manuntencao-edit-form").validate({
		
	});
});
</script>
@endpush
