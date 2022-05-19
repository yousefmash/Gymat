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