@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/cargos') }}">Cargo</a> :
@endsection
@section("contentheader_description", $cargo->$view_col)
@section("section", "Cargos")
@section("section_url", url(config('laraadmin.adminRoute') . '/cargos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Cargos Edit : ".$cargo->$view_col)

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
				{!! Form::model($cargo, ['route' => [config('laraadmin.adminRoute') . '.cargos.update', $cargo->id ], 'method'=>'PUT', 'id' => 'cargo-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nome')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/cargos') }}">Cancel</a></button>
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
	$("#cargo-edit-form").validate({
		
	});
});
</script>
@endpush
