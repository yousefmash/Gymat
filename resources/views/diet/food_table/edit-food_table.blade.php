<?php  $meals_id=[];?>
@extends('index')

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( $gym_name."/users")}}" class="px-3">الأنظمة الغذائية</a></li>
	<li class="breadcrumb-item px-3 text-muted">تعديل النظام للمشترك</li>
</ol>
@endsection

@section('admin_content')

<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        @include('users.user-details',['user_wallet'=>false])
        <div class="flex-lg-row-fluid ms-lg-15">
            <div class="card pt-4 mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm008.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"/>
                            <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"/>
                            <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <h2 class="ml-3">تسجيل إشتراك</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->       
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <form method="POST" action="{{ URL( $gym_name.'/diet/food-table/store/'.$user->id) }}">
                            @csrf
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    <tr>
                                        <td ><span class="required">مدة الجدول</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"  data-bs-original-title="عدد الأيام التي سيتلتزم بها المشترك" aria-label="عدد الأيام التي سيتلتزم بها المشترك"></i>
                                        </td>
                                        <td>
                                            <input class="form-control form-control-solid T-date"@if ($food_table->days) value='{{$food_table->days}}' @endif placeholder="لن يتم أعتماد الجدول بدون المدة" id="days" name="days"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ملاحظة</td>
                                        <td>
                                            <textarea class="form-control form-control-solid rounded-3" @if ($food_table->note) value='{{ $food_table->note }}'@endif  placeholder="أدخل ملاحظات الجدول للمشترك" name="note" rows="1"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            <div class="d-flex flex-column ">
                                <input type="submit" class="btn btn-primary d-flex justify-content-center" type="submit" value="إعتماد الجدول">
                            </div>
                        </form>
                    </div>
                    <!--end::Table wrapper-->
                </div>
            </div>
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
                        <h2 class="ml-3">النظام الغذائي</h2>
                        <i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" title="" data-bs-original-title="سيتم عرض الوجبات بنفس الترتيب للمشترك" aria-label="سيتم عرض الوجبات بنفس الترتيب للمشترك"></i>
                    </div>
                    <!--end::Card title-->
                    <div class="card-toolbar">
                        <span class="text-muted fw-bold mt-1">مجموع السعرات : {{ $sum_calories }}</span>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Addresses-->
                    <div class="row gx-9 gy-6">
                        @foreach ($food_table_meals as $m)
                            <!--begin::Col-->
                        <div class="col-xl-6">
                            <div class="border border-dashed rounded">
                                <!--begin::Card header-->
                                <div class="card-header flex-nowrap border-0 pt-9">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        @if ($m->image)
                                            <!--begin::image-->
                                            <div class="symbol symbol-45px w-45px bg-light me-5">
                                                <img src="{{ $m->image}}">
                                            </div>
                                            <!--end::image-->
                                        @endif
                                        <!--begin::Title-->
                                        <h4>{{ $m->name }}</h4>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar m-0">
                                        <!--begin::Menu-->
                                        <button type="button" data-item="{{$m->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_user">
                                            <i class="bi bi-trash-fill fs-7"></i>
                                        </button>                            
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <div class="d-flex align-items-center fw-bold mb-4">
                                        <span class="text-gray-400 fs-7">عدد السعرات: </span>
                                        <span class="badge bg-light text-gray-700 px-3 py-2 me-2 ml-2">{{ $m->calories }}</span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap  fs-6">
                                        <div class="fw-bold text-gray-400">
                                            @foreach (explode('|',$m->details) as $d)
                                            {{ $d }},
                                        @endforeach
                                    </div>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                        <!--end::Col-->
                        @endforeach
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <!--begin::Notice-->
                            <div class="notice d-flex  rounded border-primary border border-dashed flex-center mb-10 p-6">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#food_table">
                                    <!--begin::Illustration-->
                                    <img src="{{ asset("assets/media/illustrations/sketchy-1/9.png")}}" alt="" class="mw-70 mh-80px mb-3">
                                    <!--end::Illustration-->
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">إضافة وجبة</div>
                                    <!--end::Label-->
                                </button>
                                <!--end::Button-->
                            </div>                                
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>
@include('diet.food_table.add-food_table')
@endsection
@section('Javascript')
<script >
	$(document).on("click", ".modal-class", function () {
	   var itemid= $(this).attr('data-item');
	   $("#lineitem").attr("action","diet/meal/destroy/"+itemid)
	});
</script>
@endsection