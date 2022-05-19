@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الأنظمة الغذائية</li>
</ol>
@endsection

@section('admin_content')
<div id="kt_content_container" class="container-xxl">
	<div class="tab-content">
		<!--begin::Tab pane-->
		<div class="tab-pane fade show active" role="tab-panel">
			<!--begin::Orders-->
			<div class="d-flex flex-column gap-7 gap-lg-10">
				<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header border-0 ">
							<!--begin::Card Title-->
							<div class="card-title m-0">
								<h2>مجموع الأنظمة الغذائية</h2>
							</div>
							<!--end::Car Title-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $dits['sum'] }}</h4></div>
						<!--end::Card body-->
					</div>
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>طلبات الأنظمة الغذائية</h2>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="المبلغ حتى أخر ترحيل" aria-label="المبلغ حتى أخر ترحيل"></i></td>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $dits[''] }}</h4></div>
						<!--end::Card body-->
					</div>
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>مراجعة الأنظمة الغذائية</h2>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="المبلغ حتى أخر ترحيل" aria-label="المبلغ حتى أخر ترحيل"></i></td>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $dits['check'] }}</h4></div>
						<!--end::Card body-->
					</div>
				</div>
				<!--begin::Product List-->
				<div class="card card-xl-stretch mb-5 mb-xl-8">
					<div class="card-header border-0">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>الحركات المالية</h2>
						</div>
						<!--end::Card title-->
					</div>
					<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 ">
						<table id="users_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
							<thead>
								<tr class="fw-bold fs-6 text-muted">
									<th>رقم المشترك</th>
									<th>إسم المشترك</th>
									<th>وزن المشترك</th>
									<th>أضافة جدول</th>
								</tr>
							</thead>
							<tbody>
								@foreach($new_tables as $n)
									<tr>
										<td>{{ $n->user_id }}</td>
										<td>{{ $n->user_name}}</td>
										<td>{{ $n->user_weight }}</td>
										<td>
											<button type="button" data-item="{{$n->id}}" class="btn btn-icon btn-primary modal-update" data-bs-toggle="modal" data-bs-target="#edit_movements_modal">
												<i class="bi bi-pencil-square fs-4"></i>
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!--end::Product List-->
			</div>
			<!--end::Orders-->
		</div>
		<!--end::Tab pane-->
	</div>

</div>
@endsection
@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
@endsection
