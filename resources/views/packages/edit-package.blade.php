@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/packages")}}" class="px-3">باقات المشتركين</a></li>
	<li class="breadcrumb-item px-3 text-muted">تعديل الباقة</li>
</ol>
@endsection

@section('admin_content')

<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0">{{ $package->name }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        @if ($package->workout_days )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>عدد أيام التمارين : {{ $package->workout_days }}</div>
                        @endif
                        @if ($package->duration )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>مدة الإشتراك : {{ $package->duration  }}</div>
                        @endif
                        @if ($package->fitness )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>الإشتراك يشمل حصص اللياقة</div>
                        @endif
                        @if ($package->bodybuilding )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>الإشتراك يشمل صالة الحديد</div>
                        @endif
                        @if ($package->food_table )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>الإشتراك يشمل جدول غذائي</div>
                        @endif
                        @if ($package->sauna )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>عدد جلسات الساونا : {{ $package->sauna }}</div>
                        @endif
                        @if ($package->steam )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>عدد جلسات البخار : {{ $package->steam }}</div>
                        @endif
                        @if ($package->note )
                            <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>ملاحظة: {{ $package->note }}</div>
                        @endif
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer pt-0">
                    <button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#package_edit">تعديل الباقة</button>
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-10">
            <!--begin::Card-->
            <div class="card card-flush mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">مشتركين الباقة
                            <span class="text-gray-600 fs-6 ms-1">({{ count($users) }})</span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div  class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer" id="package_users">
                                <thead>
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th>المعرف</th>
                                        <th>الإسم</th>
                                        <th>رقم الهاتف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $u)
                                        <tr>
                                            <td>{{ $u->id }}</td>
                                            <td >{{ $u->name }}</td>
                                            <td >{{ $u->phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                             </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="package_edit" tabindex="-1" style="display: none;" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">تعديل باقة إشتراك</h2>
				<!--end::Modal title-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-lg-5 my-7">
				<!--begin::Form-->
				<form id="add_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name').'/package/update'.'/'.$package->id) }}">
					@csrf
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_form_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_form_header" data-kt-scroll-wrappers="#add_form_scroll" data-kt-scroll-offset="300px" style="">
						<!--begin::Input group-->
						<div class="fv-row mb-10 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">
								<span>إسم الباقة</span>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" value="{{  $package->name }}" name="name">
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Input group-->
						<!--begin::Permissions-->
						<div class="fv-row">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">تفاصيل الباقة</label>
							<!--end::Label-->
							<!--begin::Table wrapper-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5">
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">سعر الإشتراك
											<td>
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="{{  $package->price }}" name="price">
													</label>
												</div>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">عدد أيام التمارين
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="عدد الأيام التي يمكن للمشترك حضورها خلال مدة الإشتراك" aria-label="عدد الأيام التي يمكن للمشترك حضورها خلال مدة الإشتراك"></i></td>
											<td>
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="{{  $package->workout_days }}" name="workout_days">
													</label>
												</div>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">مدة الإشتراك
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="مدة الإشتراك بالأيام" aria-label="مدة الإشتراك بالأيام"></i></td>
											</td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="{{  $package->duration }}" name="duration">
													</label>
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">الصالة الحديد</td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<!--begin::Checkbox-->
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-check-input" type="checkbox" value="1" @if ($package->bodybuilding=="1") checked="checked"@endif name="bodybuilding">
													</label>
													<!--end::Checkbox-->
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">حصص اللياقة</td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<!--begin::Checkbox-->
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-check-input" type="checkbox" value="1" @if ($package->fitness=="1") checked="checked"@endif name="fitness">
													</label>
													<!--end::Checkbox-->
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">جدول غذائي</td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<!--begin::Checkbox-->
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-check-input" type="checkbox" value="1" @if ($package->food_table=="1") checked="checked"@endif name="food_table">
													</label>
													<!--end::Checkbox-->
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">جلسات الساونا
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="لإلغاء جلسات الساونا أترك الخانة فارغة" aria-label="لإلغاء جلسات الساونا أترك الخانة فارغة"></i></td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<!--begin::Checkbox-->
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="{{  $package->sauna }}" name="sauna">
													</label>
													<!--end::Checkbox-->
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">جلسات البخار
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="لإلغاء جلسات البخار أترك الخانة فارغة" aria-label="لإلغاء جلسات البخار أترك الخانة فارغة"></i></td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<!--begin::Checkbox-->
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="{{  $package->steam }}" name="steam">
													</label>
													<!--end::Checkbox-->
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">ملاحظات
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Checkbox-->
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<textarea class="form-control form-control-solid rounded-3" value="{{  $package->note }}" name="note" rows="4"></textarea>
                                                </label>
												<!--end::Checkbox-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table wrapper-->
						</div>
						<!--end::Permissions-->
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<input type="submit" class="btn btn-primary" type="submit" value="تعديل">
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
@endsection

@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
@endsection
