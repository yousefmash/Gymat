
<div class="row gx-5 gx-xl-10">
		<!--begin::Col-->
		<div class="col-sm-4 mb-5 mb-xl-10">
			<!--begin::Widget-->
			<div class="card card-flush py-2 flex-row-fluid overflow-hidden mb-3">
				<!--begin::Card header-->
				<div class="card-header border-0 ">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<h2>الإشعارات</h2>
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
						<a href="{{url( Cookie::get('gym_name')."/notices")}}" class="btn btn-sm btn-light btn-active-primary">
					عرض الإشعارات</a>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body pt-0"><h4>{{ $active_notices+$waiting_notices }}</h4></div>
				<!--end::Card body-->
			</div>
			<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
				<div class="card card-flush flex-row-fluid overflow-hidden">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>الفعالة</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0"><h4>{{ $active_notices }}</h4></div>
					<!--end::Card body-->
				</div>
				<div class="card card-flush flex-row-fluid overflow-hidden">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>إنتظار</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0"><h4>{{$waiting_notices }}</h4></div>
					<!--end::Card body-->
				</div>
			</div>
			<!--end::Widget-->
		</div>
		<!--end::Col-->
	<!--begin::Col-->
	<div class="col-sm-8 mb-5 mb-xl-10">
		<!--begin::Widget-->
		<div id="slider_widget"  class="card py-2 flex-row-fluid overflow-hidden carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="4000">
			<!--begin::Header-->
			<div class="card-header pt-3">
				<!--begin::Title-->
				<h4 class="card-title d-flex align-items-start flex-column">
					<span class="card-label fw-bolder text-gray-800">أخر الإشعارات</span>
				</h4>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar">
					<!--begin::Carousel Indicators-->
					<ol class="carousel-indicators carousel-indicators-dots">
						@for ($i=0 ; $i<count($notices);$i++ )
							<li data-bs-target="#slider_widget" data-bs-slide-to="{{ $i }}"  @if($i==0) class="ms-1 active" aria-current="true" @else class="ms-1" @endif></li>
						@endfor
					</ol>
					<!--end::Carousel Indicators-->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body mt-5">
				<!--begin::Carousel-->
				<div class="carousel-inner mt-n5">
					@foreach ($notices as  $key => $notice)
						<!--begin::Item-->
						<div class="carousel-item @if ($key==0) show active @endif">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center mb-3">
								<!--begin::Info-->
								<div class="m-0">
									<!--begin::Subtitle-->
									<h4 class="fw-bolder text-gray-800 mb-3"> {{ $notice->title }} </h4>
									<!--end::Subtitle-->
									<!--begin::Items-->
									<div class="d-flex d-grid gap-5">
										<!--begin::Item-->
										<div class="d-flex flex-column flex-shrink-0 me-4">
											<!--begin::Section-->
											<span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
												<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
												<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
														<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
												{{ $notice->admin_name }}
											</span>
											<!--end::Section-->
											<!--begin::Section-->
											<span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
												<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
												<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
														<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
												@if ($notice->target == 'all')
												جميع المشتركين
												@elseif ($notice->target == 'is_over')
												مشتركين انتهى اشتراكهم
												@elseif ($notice->target == 'will_over')
												مشتركين سينتهي اشتراكهم
												@else
												مشترك محدد
												@endif
											</span>
											<!--end::Section-->
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex flex-column flex-shrink-0">
											<!--begin::Section-->
											<span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
											<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
											<span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
													<path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->{{ $notice->content }}</span>
											<!--end::Section-->
										</div>
										<!--end::Item-->
									</div>
									<!--end::Items-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Item-->
					@endforeach
				</div>
				<!--end::Carousel-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Widget-->
	</div>
	<!--end::Col-->
</div>

										