<div class="row gx-5 gx-xl-10">
	<!--begin::Col-->
	<div class="col-sm-8 mb-5 mb-xl-10">
		<!--begin::widget-->
		<div class="card card-flush h-lg-100">
			<!--begin::Header-->
			<div class="card-header pt-3">
				<!--begin::Title-->
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder fs-3 mb-1">حضور المشتركين</span>
					<span class="text-muted mt-1 fw-bold fs-7">مقارنة حضور المشتريكن اليومي</span>
				</h3>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar">
					<a href="{{url( Cookie::get('gym_name')."/sessions")}}" class="btn btn-sm btn-light btn-active-primary">
						عرض الحركات
					</a>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pt-3">
				<div class="table-responsive" style="overflow: hidden;">
					{!! $UsersSessions->container() !!}
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::widget-->
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-xl-4">
		<!--begin::List Widget 6-->
		<div class="card card-xl-stretch mb-5 mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0">
				<h3 class="card-title fw-bolder text-dark">الجداول الغذائية</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="مراجعة الجداول الغذائية للمشتركيين الخاصين بك">
					<a href="{{url( Cookie::get('gym_name')."/diet/food-tables")}}" class="btn btn-sm btn-light btn-active-primary">
						مراجعة الجداول
					</a>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pt-0 scroll h-300px px-5 mb-3">
				@foreach ($coach as $c)
					<!--begin::Item-->
					<div class="card card-flush bg-light-dark h-md-80 mb-5 mb-xl-10">
						<!--begin::Header-->
						<div class="card-header pt-2">
							<!--begin::Title-->
							<div class="card-title d-flex flex-column">
								<!--begin::Info-->
								<div class="d-flex align-items-center">
									<!--begin::Amount-->
									<span class="fs-1 fw-bolder text-dark me-2 lh-1 ls-n2">{{ $c->name }}</span>
									<!--end::Amount-->
								</div>
								<!--end::Info-->
								<!--begin::Subtitle-->
								<span class="text-gray-400 pt-1 fw-bold fs-6">
								@if ($c->job_id == 3)
									مدير
								@else
									مدرب
								@endif</span>
								<!--end::Subtitle-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Header-->
						<!--begin::Card body-->
						<div class="card-body pt-2 pb-4 d-flex align-items-center">
							<!--begin::Labels-->
							<div class="d-flex flex-column content-justify-center w-100">
								<!--begin::Label-->
								<div class="d-flex fs-6 fw-bold align-items-center">
									<!--begin::Bullet-->
									<div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
									<!--end::Bullet-->
									<!--begin::Label-->
									<div class="text-gray-500 flex-grow-1 me-4">عدد المشتركيين</div>
									<!--end::Label-->
									<!--begin::Stats-->
									<div class="fw-boldest text-gray-700 text-xxl-end">{{ $coach_users[$c->id] }}</div>
									<!--end::Stats-->
								</div>
								<!--end::Label-->
								<!--begin::Label-->
								<div class="d-flex fs-6 fw-bold align-items-center my-3">
									<!--begin::Bullet-->
									<div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
									<!--end::Bullet-->
									<!--begin::Label-->
									<div class="text-gray-500 flex-grow-1 me-4">عدد الطلبات الجديدة</div>
									<!--end::Label-->
									<!--begin::Stats-->
									<div class="fw-boldest text-gray-700 text-xxl-end">{{ $coach_new_food_table[$c->id] }}</div>
									<!--end::Stats-->
								</div>
								<!--end::Label-->
								<!--begin::Label-->
								<div class="d-flex fs-6 fw-bold align-items-center">
									<!--begin::Bullet-->
									<div class="bullet w-8px h-6px rounded-2 me-3 bg-warning"></div>
									<!--end::Bullet-->
									<!--begin::Label-->
									<div class="text-gray-500 flex-grow-1 me-4">عدد طلبات التعديل</div>
									<!--end::Label-->
									<!--begin::Stats-->
									<div class="fw-boldest text-gray-700 text-xxl-end">{{ $coach_edit_food_table[$c->id] }}</div>
									<!--end::Stats-->
								</div>
								<!--end::Label-->
							</div>
							<!--end::Labels-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Item-->
				@endforeach
			</div>
			<!--end::Body-->
		</div>
		<!--end::List Widget 6-->
	</div>
	<!--end::Col-->
</div>										
