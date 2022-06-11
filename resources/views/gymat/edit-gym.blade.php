@extends('index')

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/gymat")}}" class="px-3">الصالات الرياضية</a></li>
	<li class="breadcrumb-item px-3 text-muted">تعديل الصالة الرياضية</li>
</ol>
@endsection

@section('admin_content')

<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::Gym Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if ($gym->logo)
                                <img src="{{$gym->logo}}" style="object-fit: contain;" alt=""/>
                            @else
                                <img src="{{asset("/assets/media/svg/avatars/blank.svg")}}" alt=""/>
                            @endif                        
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <span  class="fs-3 text-gray-800 fw-bolder mb-3">{{ $gym->name }}</span>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">
                                {{ $gym->Gym_name }}
                            </div>
                            <!--begin::Badge-->
                        </div>
                        <!--end::Position-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                    </div>
                    <!--end::Gym Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_Gym_view_details" role="button" aria-expanded="false" aria-controls="kt_Gym_view_details">تفاصيل 
                        <span class="ms-2 rotate-180">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span></div>
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_Gym_view_details" class="collapse">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5"> مدير النادي</div>
                            <div class="text-gray-600">22/2/2050</div>
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">عدد المشتركين</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">100</a>
                            </div>
                            <!--end::Details item-->
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
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
                        <h2 class="ml-3">بيانات الصالة الرياضية</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( 'admin/gymat/update/'.$gym->id) }}">
                            @csrf
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_Gyms_login_session">
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    <tr>
                                        <td>الإسم</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $gym->name }}" name="name" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>رقم الجوال</td>
                                        <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $gym->phone }}" name="phone" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>الباقة</td>
                                        <td>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <select class="form-select" name="gym_package_id" data-control="select2" data-placeholder="إختر">
                                                    @foreach ($gym_packages as $g_p)
                                                    <option value="{{ $g_p->id }}" @if ($gym->gym_package_id  == $g_p->id) selected @endif>{{ $g_p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
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