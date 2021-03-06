@extends("la.layouts.app")

@section("contentheader_title", "Empresas")
@section("contentheader_description", "Empresas listing")
@section("section", "Empresas")
@section("sub_section", "Listing")
@section("htmlheader_title", "Empresas Listing")

@section("headerElems")
@la_access("Empresas", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Cadastro Empresa</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>
                <div class="row">
                    <div class="col-xs-6">     Editar  </div>
                    <div class="col-xs-6"> Excluir </div>
                </div>
            </th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Empresas", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
                <div class="row">
                    <div class="col-xs-2">
                         <img src="{{asset('/la-assets/img/logo.png')}}" size="45" height="45" alt="">
                    </div>
                    <div class="col-xs-8">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cadastro Empresa</h4>

                    </div>

                </div>

			</div>
			{!! Form::open(['action' => 'LA\EmpresasController@store', 'id' => 'empresa-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<div class="row">
						<div class="col-xs-6">
							@la_input($module, 'razao_social')
						</div>
						<div class="col-xs-6">
							@la_input($module, 'nome_fantasia')
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2">
							@la_input($module, 'ativo')
						</div>
						<div class="col-xs-6">
							@la_input($module, 'num_licencas')
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				{!! Form::submit( 'Cadastrar', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/empresa_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Procurar"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#empresa-add-form").validate({
		
	});
});
</script>
@endpush
