@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection 

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">حركات المشتركين</li>
</ol>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="tab-content">
		<!--begin::Tab pane-->
		<div class="tab-pane fade show active" role="tab-panel">
			<div class="d-flex flex-column gap-7 gap-lg-10">
				<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>الحضور حالياً</h2>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ count($now_sessions) }}</h4></div>
						<!--end::Card body-->
					</div>
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>الحضور خلال اليوم</h2>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ count($day_sessions) }}</h4></div>
						<!--end::Card body-->
					</div>
				</div>
				<!--begin::sessions List-->
				<div class="card card-xl-stretch mb-5 mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>حركات المشتركين</h2>
						</div>
						<!--end::Card title-->
					</div>
					<!--end::Header-->
					<!--begin::Card body-->
					<div class="card-body pb-5">
						<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
							<!--begin:::Tab item-->
							<li class="nav-item" role="presentation">
								<a class="nav-link text-active-primary ms-3 active" data-bs-toggle="tab" role="tab" href="#active_table" aria-selected="false">الحضور الحالي</a>
							</li>
							<!--end:::Tab item-->
							<!--begin:::Tab item-->
							<li class="nav-item" role="presentation">
								<a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab" href="#day_table" aria-selected="true">خلال اليوم</a>
							</li>
							<!--end:::Tab item-->
						</ul>
						<!--begin::Tab Content-->
						<div id="tab_content" class="tab-content">
							<!--begin::Tab panel-->
							<div id="active_table" class="py-0 tab-pane fade active show" role="tabpanel">
								<!--begin::Table-->
								<div id="wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="table-responsive">
										<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer users_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th>المعرف</th>
													<th>الإسم</th>
													<th>وقت الحضور</th>
													<th class="text-end">تعديل</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-bold text-gray-600">
												@foreach ($now_sessions as $s)
													<!--begin::row-->
													<tr>
														<!--begin::id-->
														<td>{{ $s->user_id-100000 }}</td>
														<!--end::id-->
														<!--begin::target-->
														<td>{{ $s->user_name }}</td>
														<!--end::target-->
														<!--begin::arrival-->
														<td>{{ $s->created_at }}</td>
														<!--end::arrival-->
														<!--begin::edit-->
														<td class="text-end">
															<button type="button" data-item="{{$s->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_notice">
																<i class="bi bi-trash-fill fs-7"></i>
															</button>
														</td>
														<!--end::edit-->
													</tr>
													<!--end::row-->
												@endforeach
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
								</div>
								<!--end::Table-->
							</div>
							<!--end::Tab panel-->
							<!--begin::Tab panel-->
							<div id="day_table" class="py-0 tab-pane fade" role="tabpanel">
								<!--begin::Table-->
								<div id="wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="table-responsive">
										<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer users_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th>المعرف</th>
													<th>الإسم</th>
													<th>وقت الحضور</th>
													<th>وقت الإنصراف</th>
													<th class="text-end">تعديل</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-bold text-gray-600">
												@foreach ($day_sessions as $s)
													<!--begin::row-->
													<tr>
														<!--begin::id-->
														<td>{{ $s->user_id-100000 }}</td>
														<!--end::id-->
														<!--begin::target-->
														<td>{{ $s->user_name }}</td>
														<!--end::target-->
														<!--begin::arrival-->
														<td>{{ $s->created_at }}</td>
														<!--end::arrival-->
														<!--begin::leave-->
														<td>{{ $s->leave}}</td>
														<!--end::leave-->
														<!--begin::edit-->
														<td class="text-end">
															<button type="button" data-item="{{$s->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_notice">
																<i class="bi bi-trash-fill fs-7"></i>
															</button>
														</td>
														<!--end::edit-->
													</tr>
													<!--end::row-->
												@endforeach
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
								</div>
								<!--end::Table-->
							</div>
							<!--end::Tab panel-->
						</div>
						<!--end::Tab Content-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::sessions List-->
			</div>
		</div>
		<!--end::Tab pane-->
	</div>

</div>
@include('financial.edit-receipt')
@endsection
@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
<script>
	$(document).on("click", ".modal-update", function () {
	   var itemid= $(this).attr('data-item');
	   $("#edit_movements_form").attr("action","update-receipt/"+itemid)
	});
</script>
@endsection
