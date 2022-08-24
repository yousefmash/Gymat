@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection 

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الحركات المالية</li>
@endsection

@section('toolbar_button')
@include('financial.add-receipt',['button'=> true])
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
						<div class="card-header border-0 ">
							<!--begin::Card Title-->
							<div class="card-title m-0">
								<h2>الرصيد الحالي</h2>
							</div>
							<!--end::Car Title-->
							@if ($gym_balance>0)
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<a data-bs-toggle="modal" data-bs-target="#collect_amount_modal" class="btn btn-sm btn-light modal-collect">ترحيل الرصيد</a>
								</div>
								<!--end::Card toolbar-->
							@endif
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $gym_balance }}</h4></div>
						<!--end::Card body-->
					</div>
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>القبض</h2>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="المبلغ حتى أخر ترحيل" aria-label="المبلغ حتى أخر ترحيل"></i></td>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $total['deposit'] }}</h4></div>
						<!--end::Card body-->
					</div>
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>السحب</h2>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="المبلغ حتى أخر ترحيل" aria-label="المبلغ حتى أخر ترحيل"></i></td>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $total['withdraw'] }}</h4></div>
						<!--end::Card body-->
					</div>
				</div>
				<!--begin::financial List-->
				<div class="card card-xl-stretch mb-5 mb-xl-8">
					<div class="card-header border-0">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>الحركات المالية</h2>
						</div>
						<!--end::Card title-->
					</div>
					<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 ">
						<table id="users_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded users_table">
							<thead>
								<tr class="fw-bold fs-6 text-muted">
									<th class="mw-1px"></th>
									<th>رقم الإيصال</th>
									<th>نوع العملية</th>
									<th>القيمة</th>
									<th>رقم الإيصال</th>
									<th class="mw-sm-150px">ملاحظة النظام</th>
									<th class="mw-sm-150px">ملاحظة المستخدم</th>
									<th>التاريخ</th>
									<th>تعديل</th>
								</tr>
							</thead>
							<tbody>
								@foreach($movements as $m)
									<tr>
										<td></td>
										<td>{{ $m->receipt_num }}</td>
										<td>{{ $m->type }}</td>
										<td>{{ $m->value }}</td>
										<td>{{ $m->receipt_num }}</td>
										<td>{{ $m->system_note }}</td>
										<td>{{ $m->note }}</td>
										<td>{{ $m->updated_at->format('h:i d/m/Y') }}</td>
										@if ($m->type != 'ترحيل')
											<td>
												<button type="button" data-item="{{$m->id}}" class="btn btn-icon btn-primary  btn-xs modal-update" data-bs-toggle="modal" data-bs-target="#edit_movements_modal">
													<i class="bi bi-pencil-square fs-7"></i>
												</button>
											</td>
										@else
											<td></td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!--end::financial List-->
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
