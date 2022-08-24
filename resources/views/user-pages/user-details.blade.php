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
                    <div class="symbol-label fs-2 fw-bold text-success">
                        <!--begin::Svg Icon-->
                        <span class="svg-icon svg-icon-muted svg-icon-5tx">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <span  class="fs-3 text-gray-800 fw-bolder mb-3">{{ $user->name }}</span>
                <!--end::Name-->
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
                    @if ($last_session)
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">أخر حضور</div>
                        <div class="text-gray-600">{{ $last_session->created_at->format('H:i | Y-m-d')}}</div>
                        <!--end::Details item-->
                    @endif
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">الجنس</div>
                        <div class="text-gray-600">{{ $user->gender }}</div>
                        <!--end::Details item-->
                    @if ($user->weight)
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">الوزن</div>
                        <div class="text-gray-600">{{ $user->weight }}</div>
                        <!--end::Details item-->
                    @endif
                    @if ($user->age)
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">العمر</div>
                        <div class="text-gray-600">{{ $user->age }}</div>
                        <!--end::Details item-->
                    @endif
                    <!--begin::Details item-->
                    <div class="fw-bolder mt-5">الإشتراك</div>
                    <div class="text-gray-600">                    
                        @if ($contract)
                            {{ $contract->package_name }}
                        @else
                            غير مشترك
                        @endif
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