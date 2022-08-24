										
<div class="row gx-5 gx-xl-10">
	<!--begin::Col-->
	<div class="col-sm-4 mb-3 mb-xl-10">
		<!--begin::Widget-->
		<div class="card card-xl-stretch-50 mb-4 mb-xl-8">
			<!--begin::Header-->
			<div class="card-header pt-3 border-0">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder fs-3 mb-1">الحركات المالية</span>
					<span class="text-muted mt-1 fw-bold fs-7">أخر الحركات المالية</span>
				</h3>
				<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="عرض الحركات المالية">
					<a href="{{url( Cookie::get('gym_name')."/sessions")}}" class="btn btn-sm btn-light btn-active-primary">
				عرض الحركات</a>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pb-3 pt-0">
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 gs-0 gy-4">
							<!--begin::Table body-->
							<tbody>
								@foreach ($latest_movements as $movement)
									<tr>
										<td>
											<p class="text-dark fw-bolder d-block fs-6">				
												@if ($movement->movement_type == 'withdraw')
												صرف
												@elseif ($movement->movement_type == 'deposit')
													إيداع
												@else
													ترحيل رصيد
												@endif
											</p>
										</td>
										<td>
											<span class="text-muted fw-bold text-muted d-block fs-7">
												@if ($movement->movement_type != 'collect')
												{{ $movement->user_name }}
												@endif
											</span>
										</td>
										<td class="text-end d-flex border-0">
											@if ($movement->movement_type == 'withdraw')
												<!--begin::Svg Icon-->
												<span class="svg-icon svg-icon-2 svg-icon-danger me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="7.05026" y="15.5355" width="13" height="2" rx="1" transform="rotate(-45 7.05026 15.5355)" fill="currentColor"></rect>
														<path d="M9.17158 14.0284L9.17158 8.11091C9.17158 7.52513 8.6967 7.05025 8.11092 7.05025C7.52513 7.05025 7.05026 7.52512 7.05026 8.11091L7.05026 15.9497C7.05026 16.502 7.49797 16.9497 8.05026 16.9497L15.8891 16.9497C16.4749 16.9497 16.9498 16.4749 16.9498 15.8891C16.9498 15.3033 16.4749 14.8284 15.8891 14.8284L9.97158 14.8284C9.52975 14.8284 9.17158 14.4703 9.17158 14.0284Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											@elseif ($movement->movement_type == 'deposit')
												<!--begin::Svg Icon-->
												<span class="svg-icon svg-icon-2 svg-icon-success me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1" transform="rotate(135 16.9497 8.46448)" fill="currentColor"></rect>
														<path d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											@else
												<!--begin::Svg Icon-->
												<span class="svg-icon svg-icon-muted svg-icon-2   me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="currentColor"/>
													</svg>
												</span>
												<!--end::Svg Icon-->
											@endif

											<!--begin::Number-->
											<span class="text-gray-900 fw-boldest fs-6">{{  $movement->value }}</span>
											<!--end::Number-->
										</td>
									</tr>
								@endforeach
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<div class="text-gray-700 fw-bold fs-6 me-2">

					</div>
					<div class=" ">
						
					</div>
				</div>
			<!--end::Body-->
		</div>
		<!--end::Widget-->
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-sm-4 mb-3 mb-xl-10">
		<!--begin::Widget-->
		<div class="card card-xl-stretch-50 mb-4 mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-1">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder fs-3 mb-1">الصندوق اليومي</span>
					<span class="text-muted mt-1 fw-bold fs-7">الحركات المالية اليومية</span>
				</h3>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body d-flex justify-content-center flex-column overflow-hidden" style="padding: 0 0">
				{!! $dailyfund->container() !!}
			</div>
		</div>
		<!--end::Widget-->
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-sm-4 mb-3 mb-xl-10">
		<!--begin::Widget-->
		<div class="card card-flush py-2 flex-row-fluid overflow-hidden mb-4">
			<!--begin::Card header-->
			<div class="card-header border-0 ">
				<!--begin::Card Title-->
				<div class="card-title m-0">
					<h2>الرصيد الحالي</h2>
				</div>
				<!--end::Car Title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
					<a data-bs-toggle="modal" data-bs-target="#collect_amount_modal" class="btn btn-sm btn-light btn-active-primary">
				ترحيل المبلغ</a>
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0"><h4>{{ $gym_balance }}</h4></div>
			<!--end::Card body-->
		</div>
		<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
			<div class="card card-flush flex-row-fluid overflow-hidden">
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
			<div class="card card-flush flex-row-fluid overflow-hidden">
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
		<!--end::Widget-->
	</div>
	<!--end::Col-->
	
</div>
@include('financial.collect-amount')
