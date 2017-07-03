@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/grupos_usuarios') }}">Grupos Usuario</a> :
@endsection
@section("contentheader_description", $grupos_usuario->$view_col)
@section("section", "Grupos Usuarios")
@section("section_url", url(config('laraadmin.adminRoute') . '/grupos_usuarios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Grupos Usuarios Edit : ".$grupos_usuario->$view_col)

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
				{!! Form::model($grupos_usuario, ['route' => [config('laraadmin.adminRoute') . '.grupos_usuarios.update', $grupos_usuario->id ], 'method'=>'PUT', 'id' => 'grupos_usuario-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nome')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/grupos_usuarios') }}">Cancel</a></button>
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
	$("#grupos_usuario-edit-form").validate({
		
	});
});
</script>
@endpush
