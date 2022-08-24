@extends('index2')
@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="row g-5 g-xl-10">
		<!--begin::Col-->
		<div class="col-xl-4 mb-xl-10">
			<!--begin::Lists Widget 19-->
			<div class="card card-flush">
				<!--begin::Heading-->
				<div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-200px bg-primary">
					<!--begin::Title-->
					<h3 class="card-title align-items-start flex-column text-white pt-15">
						<span class="fw-bolder fs-2 mb-3">مرحباً, {{ Auth::user()->name }}</span>
					</h3>
					<!--end::Title-->
				</div>
				<!--end::Heading-->
				<!--begin::Body-->
				<div class="card-body mt-n20">
					<!--begin::Stats-->
					<div class="mt-n20 position-relative">
						<!--begin::Row-->
						<div class="row g-3 g-lg-6">
							<!--begin::Col-->
							<div class="col-6">
								<!--begin::Items-->
								<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
									<!--begin::Symbol-->
									<div class="symbol symbol-30px me-5 mb-8">
										<span class="symbol-label">
											<!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
											<span class="svg-icon svg-icon-1 svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z" fill="currentColor"/>
													<path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Stats-->
									<div class="m-0">
										<!--begin::Number-->
										<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">
											@if ($sum_calories)
												{{ $sum_calories }}
											@else
												--
											@endif
										</span>
										<!--end::Number-->
										<!--begin::Desc-->
										<span class="text-gray-500 fw-bold fs-6">السعرات</span>
										<!--end::Desc-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-6">
								<!--begin::Items-->
								<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
									<!--begin::Symbol-->
									<div class="symbol symbol-30px me-5 mb-8">
										<span class="symbol-label">
											<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
											<span class="svg-icon svg-icon-1 svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
													<path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor"/>
													<path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Stats-->
									<div class="m-0">
										<!--begin::Number-->
										<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">
											@if ($food_table_meals)
												{{ count($food_table_meals) }}
											@else
												--
											@endif
										</span>
										<!--end::Number-->
										<!--begin::Desc-->
										<span class="text-gray-500 fw-bold fs-6">وجبة</span>
										<!--end::Desc-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-6">
								<!--begin::Items-->
								<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
									<!--begin::Symbol-->
									<div class="symbol symbol-30px me-5 mb-8">
										<span class="symbol-label">
											<!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
											<span class="svg-icon svg-icon-1 svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Stats-->
									<div class="m-0">
										<!--begin::Number-->
										<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">
											@if (Auth::user()->weight)
											{{ Auth::user()->weight }}
											@else
												--
											@endif</span>
										<!--end::Number-->
										<!--begin::Desc-->
										<span class="text-gray-500 fw-bold fs-6">وزنك</span>
										<!--end::Desc-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-6">
								<!--begin::Items-->
								<div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
									<!--begin::Symbol-->
									<div class="symbol symbol-30px me-5 mb-8">
										<span class="symbol-label">
											<!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
											<span class="svg-icon svg-icon-1 svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z" fill="currentColor"></path>
													<path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z" fill="currentColor"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Stats-->
									<div class="m-0">
										<!--begin::Number-->
										<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">
											@if ($food_table)
												{{ $food_table->days }}
											@else
												--
											@endif
										</span>
										<!--end::Number-->
										<!--begin::Desc-->
										<span class="text-gray-500 fw-bold fs-6">مدة الجدول</span>
										<!--end::Desc-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Stats-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Lists Widget 19-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-8 mb-5 mb-xl-10">
			<!--begin::Row-->
			<div class="row g-5 g-xl-10">
				@if ($food_table_meals)
					@php
					$meal_num = 1;
					@endphp
					@foreach ($food_table_meals as $m)
						<!--begin::Col-->
						<div class="col-xl-6 mb-xl-3">
							<!--begin::Widget-->
							<div class="card card-flush">
								<!--begin::Header-->
								<div class="card-header pt-3">
									<!--begin::Title-->
									<h4 class="card-title d-flex align-items-start flex-column">
										<span class="card-label fw-bolder text-gray-800">وجبة رقم {{ $meal_num }}</span>
									</h4>
									<!--end::Title-->
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body pt-0">
									<div class="d-flex align-items-center mb-5">
										<!--begin::Chart-->
										<div class="w-80px flex-shrink-0 me-2">
											<span class="text-gray-700 fw-boldest d-block fs-2qx lh-1 ls-n1 mb-1">{{ $m->calories}}</span>
										</div>
										<!--end::Chart-->
										<!--begin::Info-->
										<div class="m-0">
											<!--begin::Subtitle-->
											<h4 class="fw-bolder text-gray-800 mb-3">{{ $m->name }}</h4>
											<!--end::Subtitle-->
											<!--begin::Items-->
											<div class="d-flex flex-column content-justify-center flex-grow-1">
												@foreach (explode('|',$m->details) as $d)
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="fs-6 fw-bold text-gray-400 flex-shrink-0">{{ $d }}</div>
														<!--end::Label-->
													</div>
													<!--end::Label-->
												@endforeach
											</div>
											<!--end::Items-->
										</div>
										<!--end::Info-->
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Widget-->
						</div>
						<!--end::Col-->
						@php
							$meal_num += 1;
						@endphp
					@endforeach					
				@endif
				
			</div>
			<!--end::Row-->
		</div>
		<!--end::Col-->
	</div>
</div>
@endsection
