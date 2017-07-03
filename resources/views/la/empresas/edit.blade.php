@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/empresas') }}">Empresa</a> :
@endsection
@section("contentheader_description", $empresa->$view_col)
@section("section", "Empresas")
@section("section_url", url(config('laraadmin.adminRoute') . '/empresas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Empresas Edit : ".$empresa->$view_col)

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
				{!! Form::model($empresa, ['route' => [config('laraadmin.adminRoute') . '.empresas.update', $empresa->id ], 'method'=>'PUT', 'id' => 'empresa-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'razao_social')
					@la_input($module, 'nome_fantasia')
					@la_input($module, 'ativo')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/empresas') }}">Cancel</a></button>
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
	$("#empresa-edit-form").validate({
		
	});
});
</script>
@endpush
