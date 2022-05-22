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
				<div class="row g-5 g-xl-8">
					<div class="col-xl-3">
						<div href="#" class="card bg-body card-xl-stretch mb-xl-8">
							<!--begin::Body-->
							<div class="card-body">
								<h2>مجموع الأنظمة الغذائية الفعالة</h2>
								<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $dits['active'] }}</div>
							</div>
							<!--end::Body-->
						</div>
					</div>
					<div class="col-xl-3">
						<div href="#" class="card bg-body card-xl-stretch mb-xl-8">
							<!--begin::Body-->
							<div class="card-body">
								<h2>طلبات الأنظمة الغذائية الجديدة</h2>
								<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $dits['new'] }}</div>
							</div>
							<!--end::Body-->
						</div>
					</div>
					<div class="col-xl-3">
						<div href="#" class="card bg-body card-xl-stretch mb-xl-8">
							<!--begin::Body-->
							<div class="card-body">
								<h2>مراجعة الأنظمة الغذائية</h2>
								<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $dits['check'] }}</div>
							</div>
							<!--end::Body-->
						</div>
					</div>
					<div class="col-xl-3">
						<!--begin::Statistics Widget 5-->
						<a class="card bg-primary hoverable card-xl-stretch mb-xl-8" data-bs-toggle="modal" data-bs-target="#Search-food_table">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
								<span class="svg-icon svg-icon-white svg-icon-5x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="currentColor"/>
										<path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="currentColor"/>
									</svg>
								</span>
								<!--end::Svg Icon-->
								<div class="text-white fw-bolder fs-2 mb-2 mt-2">بحث عن مشترك</div>
								<div class="fw-bold text-white">عرض النظام الغذائي للمشترك</div>
							</div>
							<!--end::Body-->
						</a>
						<!--end::Statistics Widget 5-->
					</div>
				</div>
				<!--begin::Product List-->
				<div class="row g-5 g-xl-8">
					<div class="col-xl-6">
						<!--begin::List Widget 7-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header align-items-center border-0 mt-4">
								<h3 class="card-title align-items-start flex-column">
									<span class="fw-bolder text-dark">طلبات الأنظمة غذائية</span>
									<span class="text-muted mt-1 fw-bold fs-7">Articles and publications</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-3">
								<table class="table table-striped table-row-bordered gy-5 gs-7 border rounded users_table">
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
													<a data-item="{{$n->id}}" class="btn btn-icon btn-primary modal-update" href="{{ url($gym_name.'/diet/food-table/'.$n->user_id) }}" >
														<i class="bi bi-plus fs-2"></i>
													</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!--end::Body-->
						</div>
						<!--end::List Widget 7-->
					</div>
					<div class="col-xl-6">
						<!--begin::List Widget 7-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header align-items-center border-0 mt-4">
								<h3 class="card-title align-items-start flex-column">
									<span class="fw-bolder text-dark">مراجعة الأنظمة غذائية</span>
									<span class="text-muted mt-1 fw-bold fs-7">Articles and publications</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-3">
								<table  class="table table-striped table-row-bordered gy-5 gs-7 border rounded users_table">
									<thead>
										<tr class="fw-bold fs-6 text-muted">
											<th>رقم المشترك</th>
											<th>إسم المشترك</th>
											<th>وزن المشترك</th>
											<th>أضافة جدول</th>
										</tr>
									</thead>
									<tbody>
										@foreach($tables_to_check as $c)
											<tr>
												<td>{{ $c->user_id }}</td>
												<td>{{ $c->user_name}}</td>
												<td>{{ $c->user_weight }}</td>
												<td>
													<a  data-item="{{$c->id}}" class="btn btn-icon btn-primary modal-update" href="{{ url($gym_name.'/diet/food-table/'.$c->user_id) }}">
														<i class="bi bi-pencil-square fs-7"></i>
													</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!--end::Body-->
						</div>
						<!--end::List Widget 7-->
					</div>
				</div>
			</div>
			<!--end::Orders-->
		</div>
		<!--end::Tab pane-->
	</div>
</div>

@include('financial.user-search',['url'=>'diet/food-table-search','id'=>'food_table'])
@endsection
@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
@endsection
