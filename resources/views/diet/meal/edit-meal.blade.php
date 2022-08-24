@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/diet/meals")}}" class="px-3">الوجبات</a></li>
	<li class="breadcrumb-item px-3 text-muted">تعديل الوجبة</li>
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
                        <h2 class="mb-0">{{ $meal->name }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="mb-9">
                        <!--begin::Badge-->
                        <div class="badge badge-lg badge-light-warning d-inline">
                            {{ $meal->calories }} سعرة حرارية
                        </div>
                        <!--begin::Badge-->
                    </div>
                    <div class="mb-9">
                        <!--begin::Badge-->
                        <div class="badge badge-lg badge-light-primary d-inline">
                            {{ count($users) }} شخص يستعمل الوجبة
                        </div>
                        <!--begin::Badge-->
                    </div>
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
						@foreach (explode("|", $meal->details) as $detail)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span> {{ $detail }}
                            </div>
						@endforeach
                    </div>
                </div>
                <!--end::Card body-->
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
                        <h2 class="d-flex align-items-center">تعديل الوجبة</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
				    <!--begin::Form-->
                    <form id="add_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name').'/diet/meal/update'.'/'.$meal->id) }}">
                        @csrf
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span>إسم الوجبة</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" value="{{  $meal->name }}" name="name">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">تفاصيل الوجبة</label>
                            <!--end::Label-->
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        <!--begin::Table row-->
                                        <tr>
                                            <td class="text-gray-800">السعرات الحرارية
                                            <td>
                                                <div class="d-flex">
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-control form-control-solid" type="text" value="{{  $meal->calories }}" name="calories">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Table row-->
                                    
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">العناصر
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="الفصل بين عناصر الوجبة ب(|)" aria-label="الفصل بين عناصر الوجبة ب(|)"></i></td>
                                            <!--end::Label-->
                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                    <textarea class="form-control form-control-solid rounded-3" placeholder="{{  $meal->details }}" name="details" rows="4">{{  $meal->details }}</textarea>
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
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <input type="submit" class="btn btn-primary" type="submit" value="تعديل">
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
</div>

@endsection
