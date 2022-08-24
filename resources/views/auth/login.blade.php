@extends('auth.home')
@section('login_content')
<!--begin::Wrapper-->
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" id="sign_in_form" action="{{ route('login') }}" method="post">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3"><img alt="Logo" src="{{ asset("assets/media/logos/logo-dark.png")}}" class="h-40px" /></h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">رقم الهاتف</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="{{url( "login/password")}}" class="link-secondary fs-6 fw-bolder">تفعيل الحساب؟</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="phone" autocomplete="off" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">كلمة السر</label>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="إذا نسيت كلمة السر توجه لإدارة الصالة" aria-label="إذا نسيت كلمة السر توجه لإدارة الصالة"></i></td>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"au tocomplete="off" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-warning w-100 mb-2">
                <span class="indicator-label">Continue</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->
@endsection