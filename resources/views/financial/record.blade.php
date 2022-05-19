@extends('index')

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">السجل المالي للمشترك</li>
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
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <div class="symbol-label fs-2 fw-bold text-success"><i class="fonticon-user fs-5x"></i></div>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <span  class="fs-3 text-gray-800 fw-bolder mb-3">{{ $user->name }}</span>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">
                                @switch($user->job_id)
                                @case('1')
                                    مشترك
                                    @break
                                @case('3')
                                    مدير
                                    @break
                                @case('4')
                                    محاسب
                                    @break
                                @case('5')
                                مدرب
                                @break								
                            @endswitch</div>
                            <!--begin::Badge-->
                        </div>
                        <!--end::Position-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                            <div class="fs-6 text-gray-800 fw-bolder">₪{{ $total }}</div>
                            <div class="fw-bold text-gray-400">رصيد المشترك</div>
                        </div>
                    </div>
                    <!--end::User Info-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">تفاصيل 
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
                    <div id="kt_user_view_details" class="collapse">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">أخر حضور</div>
                            <div class="text-gray-600">22/2/2050</div>
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">رصيد المحفظة</div>
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
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/finance/fin008.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"/>
                            <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"/>
                            <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <h2 class="ml-3">السجل المالي</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        @include('financial.add-receipt',['button'=> true])
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 pb-5">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                            <!--begin::Table head-->
                            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                <!--begin::Table row-->
                                <tr class="text-start text-muted text-uppercase gs-0">
									<th>نوع العملية</th>
									<th>القيمة</th>
									<th>رقم الإيصال</th>
									<th class="mw-sm-150px">ملاحظة المستخدم</th>
									<th>التاريخ</th>
									<th>تعديل</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fs-6 fw-bold text-gray-600">
                                @foreach($movements as $m)
                                <tr>
                                    <td>{{ $m->type }}</td>
                                    <td>{{ $m->value }}</td>
                                    <td>{{ $m->receipt_num }}</td>
                                    <td>{{ $m->note }}</td>
                                    <td>{{ $m->updated_at }}</td>
                                    <td>
                                        <button type="button" data-item="{{$m->id}}" class="btn btn-icon btn-primary modal-update" data-bs-toggle="modal" data-bs-target="#edit_movements_modal">
                                            <i class="bi bi-pencil-square fs-4"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>
@include('financial.edit-receipt')
@endsection
@section('Javascript')
<script>
	$(document).on("click", ".modal-update", function () {
	   var itemid= $(this).attr('data-item');
	   $("#edit_movements_form").attr("action","update-receipt/"+itemid)
	});
</script>
@endsection