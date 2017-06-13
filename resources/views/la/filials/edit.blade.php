@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/filials') }}">Filial</a> :
@endsection
@section("contentheader_description", $filial->$view_col)
@section("section", "Filials")
@section("section_url", url(config('laraadmin.adminRoute') . '/filials'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Filials Edit : ".$filial->$view_col)

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
				{!! Form::model($filial, ['route' => [config('laraadmin.adminRoute') . '.filials.update', $filial->id ], 'method'=>'PUT', 'id' => 'filial-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'razao_social')
					@la_input($module, 'cnpj')
					@la_input($module, 'inscricao_estadual')
					@la_input($module, 'ult_sinc')
					@la_input($module, 'licencas')
					@la_input($module, 'ativo')
					@la_input($module, 'empresa_vinculada')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/filials') }}">Cancel</a></button>
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
	$("#filial-edit-form").validate({
		
	});
});
</script>
@endpush
