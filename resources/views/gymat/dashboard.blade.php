@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الصالات الرياضية</li>
</ol>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="card card-xl-stretch mb-5 mb-xl-8">
		<div class="card-header border-0">
			<!--begin::Card title-->
			<div class="card-title">
				<h2>الصالات الرياضية</h2>
			</div>
			<!--end::Card title-->
			<!--begin::Card toolbar-->
			<div class="card-toolbar">
				@include('gymat.add-gym')
			</div>
			<!--end::Card toolbar-->
		</div>
		<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 ">
			<table id="users_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded users_table">
				<thead>
					<tr class="fw-bold fs-6 text-muted">
						<th>المعرف</th>
						<th>الشعار</th>
						<th>الإسم</th>
						<th>رقم الهاتف</th>
						<th>الباقة</th>
						<th >تعديل|حذف</th>
					</tr>
				</thead>
				<tbody>
					@foreach($gymat as $g)
						<tr>
							<td>{{ $g->id }}</td>
							<td>
								<div class="symbol symbol-50px overflow-hidden me-3">
									@if ($g->logo)
										<img src="{{$g->logo}}" class="w-100"/>
									@else
										<img src="{{asset("/assets/media/svg/avatars/blank.svg")}}" alt=""/>
									@endif
								</div>
							</td>
							<td>{{ $g->name }}</td>
							<td>{{ $g->phone }}</td>
							<td>@foreach ($gym_packages as $g_p)
								@if ($g_p->id == $g->gym_package_id)
									{{ $g_p->name }}
								@endif
							@endforeach</td>
							<td>
								<a href="{{url( $gym_name.'/gymat/edit/'.$g->id)}}" class="btn btn-icon btn-primary"><i class="bi bi-pencil-square fs-7"></i></a>
								<button type="button" data-item="{{$g->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
									<i class="bi bi-trash-fill fs-7"></i>
								</button>
							</td>						
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" id="kt_modal_2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
				<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					هل تريد حذف الصالة الرياضية ؟
				</label>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<form action="#" id='lineitem' method="post">
					@csrf
					<input type="submit" class="btn btn-danger" type="submit" value="حذف">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</form>
			</div>
		</div>
	</div>
</div>			

@endsection
@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
<script>
	$(document).on("click", ".modal-class", function () {
	   var itemid= $(this).attr('data-item');
	   $("#lineitem").attr("action","gymat/destroy/"+itemid)
	});
</script>
@endsection
