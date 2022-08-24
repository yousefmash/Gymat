@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">باقات المشتركين</li>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
		@foreach ($packages as $p)
			<!--begin::Col-->
			<div class="col-md-4">
				<!--begin::Card-->
				<div class="card card-flush h-md-100">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>{{ $p->name }}</h2>
						</div>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-1">
						<!--begin::Users-->
						<div class="fw-bolder text-gray-600 mb-5">سعر الإشتراك : {{ $p->price }}₪</div>
						<!--end::Users-->
						<!--begin::Permissions-->
						<div class="d-flex flex-column text-gray-600">
							@if ($p->workout_days )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>عدد أيام التمارين : {{ $p->workout_days }}</div>
							@endif
							@if ($p->duration )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>مدة الإشتراك : {{ $p->duration  }}</div>
							@endif
							@if ($p->fitness )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>الإشتراك يشمل حصص اللياقة</div>
							@endif
							@if ($p->bodybuilding )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>الإشتراك يشمل صالة الحديد</div>
							@endif
							@if ($p->food_table )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>الإشتراك يشمل جدول غذائي</div>
							@endif
							@if ($p->sauna )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>عدد جلسات الساونا : {{ $p->sauna }}</div>
							@endif
							@if ($p->steam )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>عدد جلسات البخار : {{ $p->steam }}</div>
							@endif
							@if ($p->note )
								<div class="d-flex align-items-center py-2">
								<span class="bullet bg-primary me-3"></span>ملاحظة: {{ $p->note }}</div>
							@endif
						</div>
						<!--end::Permissions-->
					</div>
					<!--end::Card body-->
					<!--begin::Card footer-->
					<div class="card-footer flex-wrap pt-0">
						<a href="{{ url(Cookie::get('gym_name').'/package'.'/'.$p->id) }}" class="btn btn-light btn-active-primary my-1 me-2">تفاصيل الباقة</a>
						<button type="button" data-item="{{$p->id}}" class="btn btn-light btn-active-danger my-1 me-2 modal-class" data-bs-toggle="modal" data-bs-target="#destroy_package">
						حذف الباقة	
						</button>
					</div>
					
					<!--end::Card footer-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Col-->
		@endforeach
		<!--begin::Add new card-->
		<div class="col-md-4">
			<!--begin::Card-->
			<div class="card h-md-100">
				<!--begin::Card body-->
				<div class="card-body d-flex flex-center">
					<!--begin::Button-->
					<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#add_form">
						<!--begin::Illustration-->
						<img src="{{ asset("assets/media/illustrations/sketchy-1/2.png")}}" alt="" class="mw-100 mh-150px mb-7">
						<!--end::Illustration-->
						<!--begin::Label-->
						<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">إضافة باقة جديدة</div>
						<!--end::Label-->
					</button>
					<!--end::Button-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Add new card-->
	</div>
</div>
@include('packages.add-package')
<div class="modal fade" tabindex="-1" id="destroy_package">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
				<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					هل تريد حذف الباقة ؟
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
<script>
	$(document).on("click", ".modal-class", function () {
	   var itemid= $(this).attr('data-item');
	   $("#lineitem").attr("action","package/destroy/"+itemid)
	});
</script>
@endsection


