@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الوجبات</li>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="row g-5 g-xl-8">
		@foreach ($meals as $m)
		<div class="col-xl-4">
			<!--begin::Widget-->
			<div class="card card-flush bgi-no-repeat card-xl-stretch mb-xl-8">
				<!--begin::Body-->
				<div class="card-body">
					<a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">{{ $m->name }}</a>
					<div class="fw-bolder text-primary my-6">{{ $m->calories}} سعرة حرارية</div>
					<p class="text-dark-75 fw-bold fs-5 m-0">
						@foreach (explode("|", $m->details) as $detail)
							{{ $detail }}<br>
						@endforeach
					</p>
				</div>
				<!--end::Body-->
				<!--begin::Footer-->
				<div class="card-footer">
					<a href="{{ url(Cookie::get('gym_name').'/diet/meal'.'/'.$m->id) }}" class="btn btn-light btn-active-primary my-1 me-2">تفاصيل الوجبة</a>
					<button type="button" data-item="{{$m->id}}" class="btn btn-light btn-active-danger my-1 me-2 modal-class" data-bs-toggle="modal" data-bs-target="#destroy_meal">
					حذف الوجبة	
					</button>
				</div>
				<!--end::Footer-->

			</div>
			<!--end::Widge-->
		</div>
		@endforeach
		<!--begin::Add new card-->
		<div class="col-xl-4">
			<!--begin::Widget-->
			<div class="card bgi-no-repeat card-xl-stretch mb-xl-8">
					<!--begin::Card body-->
					<div class="card-body  d-flex flex-center">
						<!--begin::Button-->
						<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#add_meal">
							<!--begin::Illustration-->
							<img src="{{ asset("assets/media/illustrations/sketchy-1/9.png")}}" alt="" class="mw-70 mh-80px mb-3">
							<!--end::Illustration-->
							<!--begin::Label-->
							<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">إضافة وجبة جديدة</div>
							<!--end::Label-->
						</button>
						<!--end::Button-->
					</div>
					<!--end::Card body-->
			</div>
			<!--end::Widge-->
		</div>
		<!--begin::Add new card-->
	</div>
</div>
@include('diet.meal.add-meal')
<div class="modal fade" tabindex="-1" id="destroy_meal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
				<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					هل تريد حذف الوجبة ؟
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
	   $("#lineitem").attr("action","diet/meal/destroy/"+itemid)
	});
</script>
@endsection
