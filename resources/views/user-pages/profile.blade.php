@extends('index2')
@section('content')


<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            @include('user-pages.user-details')
        </div>
        <div class="flex-lg-row-fluid ms-lg-15">
            <div class="card pt-4 mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">
                         <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                         <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <h2 class="ml-3">الملف الشخصي</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary btn-hover-scale me-5" data-bs-toggle="modal" data-bs-target="#reset_password">
                            تغيير كلمة السر
                        </button>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name').'/profile/update') }}">
                            @csrf
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    <tr>
                                        <td>رقم الجوال</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->phone }}" name="phone" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ الميلاد</td>
                                        <td><input class="form-control form-control-lg form-control-solid T-date" type="text" value="{{ $user->age }}" name="age" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>الوزن</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->weight }}" name="weight" autocomplete="off"></td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            <div class="d-flex flex-column ">
                                <input type="submit" class="btn btn-primary d-flex justify-content-center" type="submit" value="تعديل">
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="reset_password">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name')).'/reset-password' }}">
                @csrf
			    <div class="modal-body d-block justify-content-center">
					<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
                        xx
                    </label>
					<div class="mt-4 mx-20">
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="form-label">تغيير كلمة السر</label>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="إختر نوع البيانات التي تريد البحث عن المشترك بها" aria-label="إختر نوع البيانات التي تريد البحث عن المشترك بها"></i></td>
                            <input type="password" name="password" class="form-control mb-2 mb-md-0 mt-3" placeholder="أدخل كلمة السر الحالية" />
                            <input type="password" name="new_password" class="form-control mb-2 mb-md-0 mt-3" placeholder="أدخل كلمة السر الجديدة" />
                            <input type="password" name="re_password" class="form-control mb-2 mb-md-0 mt-3" placeholder="أدخل كلمة السر الجديدة مجدداً" />
                        </div>
                        <!--end::Form group-->
                    </div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" class="btn btn-primary" type="submit" value="بحث">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('Javascript')
<script src="{{ asset("assets/js/time-table.js") }}"></script>
@endsection