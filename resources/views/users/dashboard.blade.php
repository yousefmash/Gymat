@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">المشتركين</li>
</ol>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="card card-xl-stretch mb-5 mb-xl-8">
		<div class="card-header border-0">
			<!--begin::Card title-->
			<div class="card-title">
				<h2>المشتركين</h2>
			</div>
			<!--end::Card title-->
			<!--begin::Card toolbar-->
			<div class="card-toolbar">
				@include('users.add-user')
			</div>
			<!--end::Card toolbar-->
		</div>
		<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 ">
			<table id="users_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded users_table">
				<thead>
					<tr class="fw-bold fs-6 text-muted">
						<th>المعرف</th>
						<th>الإسم</th>
						<th>رقم الهاتف</th>
						<th>الجنس</th>
						<th>الباقة</th>
						<th>نوع المشترك</th>
						<th >تعديل|حذف</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $u)
						<tr>
							<td>{{ $u->id }}</td>
							<td>{{ $u->name }}</td>
							<td>{{ $u->phone }}</td>
							<td>{{ $u->gender }}</td>
							<td>{{ $u->package_name }}</td>
							<td>
								@switch($u->job_name)
									@case('user')
										مشترك
										@break
									@case('manager')
										مدير
										@break
									@case('accountant')
										محاسب
										@break
									@case('coach')
									مدرب
									@break								
								@endswitch
							</td>
							<td>
								<a href="{{url( Cookie::get('gym_name').'/user/edit/'.$u->id)}}" class="btn btn-icon btn-primary"><i class="bi bi-pencil-square fs-7"></i></a>
								<button type="button" data-item="{{$u->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_user">
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
<div class="modal fade" tabindex="-1" id="destroy_user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
				<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					هل تريد حذف المشترك ؟
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
	   $("#lineitem").attr("action","user/destroy/"+itemid)
	});
</script>
@endsection
