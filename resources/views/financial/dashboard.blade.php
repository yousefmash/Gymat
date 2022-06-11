@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection 

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الحركات المالية</li>
</ol>
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
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<a data-bs-toggle="modal" data-bs-target="#collect_amount_modal" class="btn btn-sm btn-light modal-collect">ترحيل الرصيد</a>
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0"><h4>{{ $total['sum'] }}</h4></div>
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
									<th>التاريخ</th>
									<th>رقم الإيصال</th>
									<th>نوع العملية</th>
									<th>القيمة</th>
									<th>رقم الإيصال</th>
									<th class="mw-sm-150px">ملاحظة النظام</th>
									<th class="mw-sm-150px">ملاحظة المستخدم</th>
									<th>تعديل</th>
								</tr>
							</thead>
							<tbody>
								@foreach($movements as $m)
									<tr>
										<td>{{ $m->updated_at->format('h:i d/m/Y') }}</td>
										<td>{{ $m->receipt_num }}</td>
										<td>{{ $m->type }}</td>
										<td>{{ $m->value }}</td>
										<td>{{ $m->receipt_num }}</td>
										<td>{{ $m->system_note }}</td>
										<td>{{ $m->note }}</td>
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
<div class="modal fade" tabindex="-1" id="collect_amount_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<form action="{{ URL( Cookie::get('gym_name').'/collect-amount') }}" id='collect_amount_form' method="post">
					@csrf
					<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
						المبلغ المراد تحصيله:
					</label>
					<div class="mt-4 mx-20">
						<input type="text" value="{{ $total['sum'] }}" name="receipt_num" class="form-control mb-2 mb-md-0" placeholder="أدخل رقم الإيصال" />
					</div>
					<div class="mt-4 mx-20">
						<textarea class="form-control form-control-solid rounded-3" name="note" rows="1" placeholder="أضف ملاحظة"></textarea>												</label>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" class="btn btn-primary" type="submit" value="سحب">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</div>
			</form>
		</div>
	</div>
</div>
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
