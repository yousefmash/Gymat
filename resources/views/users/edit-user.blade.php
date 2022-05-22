@extends('index')

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( $gym_name."/users")}}" class="px-3">المشتركين</a></li>
	<li class="breadcrumb-item px-3 text-muted">تعديل المشترك</li>
</ol>
@endsection

@section('admin_content')

<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        @include('users.user-details',['user_wallet'=>true])
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
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/user/update/'.$user->id) }}">
                            @csrf
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    <tr>
                                        <td>الإسم</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $user->name }}" name="name" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>رقم الجوال</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $user->phone }}" name="phone" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>الجنس</td>
                                        <td>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" name="gender" type="radio" value="ذكر" @if ($user->gender=="ذكر") checked="checked"@endif/>
                                                <label class="form-check-label" for="form_checkbox">
                                                    ذكر
                                                </label>
                                                <input class="form-check-input ml-3" name="gender" type="radio" value="أنثى" @if ($user->gender=="أنثى") checked="checked"@endif/>
                                                <label class="form-check-label" for="form_checkbox">
                                                    أنثى
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>نوع المشترك</td>
                                        <td><div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" name="job" type="radio" value="1" @if ($user->job_id==1) checked="checked"@endif/>
                                            <label class="form-check-label" for="form_checkbox">
                                                مشترك
                                            </label>
                                            <input class="form-check-input ml-3" name="job" type="radio" value="4" @if ($user->job_id==4) checked="checked"@endif/>
                                            <label class="form-check-label" for="form_checkbox">
                                                محاسب
                                            </label>
                                            <input class="form-check-input ml-3" name="job" type="radio" value="5" @if ($user->job_id==5) checked="checked"@endif/>
                                            <label class="form-check-label" for="form_checkbox">
                                                مدرب
                                            </label>
                                            <input class="form-check-input ml-3" name="job" type="radio" value="3" @if ($user->job_id==3) checked="checked"@endif/>
                                            <label class="form-check-label" for="form_checkbox">
                                                مدير
                                            </label>
                                        </div></td>
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
@endsection