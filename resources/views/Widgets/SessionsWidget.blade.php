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
					<span class="text-muted mt-1 fw-bold fs-7">مقارنة حضور المشتريكن اليومي خلال اليوم</span>
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
					{!! $dailySessions->container() !!}
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::widget-->
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-sm-4 mb-5 mb-xl-10">
		<div class="card card-xl-stretch">
			<!--begin::Header-->
			<div class="card-header border-0 pt-3">
				<!--begin::Title-->
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder fs-3 mb-1">المشتركين</span>
				</h3>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar">
					<a href="{{url( Cookie::get('gym_name')."/users")}}" class="btn btn-sm btn-light btn-active-primary">
						عرض المشتركين
					</a>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body p-0">
				<!--begin::Chart-->
				
				<!--end::Chart-->
				<!--begin::Stats-->
				<div class="card-p  position-relative">
					<!--begin::Row-->
					<div class="row g-0">
						<!--begin::Col-->
						<div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
							<h4 class="text-success">
								{{ $usersnum }}
							</h4>
							<p class="text-success fw-bold fs-6">عدد المشتركين</p>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col bg-light-warning px-6 py-8 rounded-2 mb-7">
							<h4 class="text-warning">
								{{ $inactive_users }}
							</h4>
							<p class="text-warning fw-bold fs-6">مشتركيين بدون باقة</p>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Row-->
					<div class="row g-0">
						<!--begin::Col-->
						<div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
							<h4 class="text-danger">
								{{ $women_users }}
							</h4>
							<p class="text-danger fw-bold fs-6">المشتركين النساء</p>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col bg-light-primary px-6 py-8 rounded-2">
							<h4 class="text-primary">
								{{ $men_users }}
							</h4>
							<p class="text-primary fw-bold fs-6">المشتركين الرجال</p>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Stats-->
			</div>
			<!--end::Body-->
		</div>
	</div>
	<!--end::Col-->
</div>										
								