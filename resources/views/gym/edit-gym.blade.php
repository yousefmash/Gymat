@extends('index')

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( $gym_name."/dashboard")}}" class="px-3">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="{{url( $gym_name."/gym")}}" class="px-3">الصالات الرياضية</a></li>
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
                    <!--begin::gym Info-->
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
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                    </div>
                    <!--end::gym Info-->
                    <!--end::Summary-->
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
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">الملف الشخصي</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">مواعيد العمل</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade active show" id="kt_user_view_overview_tab" role="tabpanel">
                    <!--begin::Card-->
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
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" method="post" action="{{ URL( $gym_name.'/gym/update/'.$gym->id) }}">
                                    @csrf
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <label class="fs-6 fw-bold mb-3">
                                                        <span>الشعار</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="ملف بصيغة: png, jpg, jpeg." aria-label="Allowed file types: png, jpg, jpeg."></i>
                                                    </label>
                                                </td>
                                                <td>
                                                    <!--begin::Image input wrapper-->
                                                    <div class="mt-1">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline" data-kt-image-input="true" style=" background-image: url('{{asset("/assets/media/svg/avatars/blank.svg")}}')">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-100px h-100px" style=" background-image: url('{{asset("/assets/media/svg/avatars/blank.svg")}}')"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Edit-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="تغيير الصورة">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg">
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="إلغاء الصورة">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                    <!--end::Image input wrapper-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>إسم الصالة</td>
                                                <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $gym->name }}" name="name" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>رقم الجوال</td>
                                                <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $gym->phone }}" name="phone" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>العنوان</td>
                                                <td><input class="form-control form-control-lg form-control-solid" type="text" placeholder="{{ $gym->address }}" name="address" autocomplete="off"></td>
                                           </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                    <!--begin::Separator-->
                                    <div class="separator mb-6"></div>
                                    <!--end::Separator-->
                                    <!--begin::Action buttons-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">إلغاء</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                            <span class="indicator-label">تعديل</span>
                                            <span class="indicator-progress">إنتظر... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Action buttons-->
                                <div></div></form>
                                <!--begin::Form-->
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" >

                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>مواعيد العمل</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                <li class="nav-item"  data-bs-toggle="tooltip" data-bs-placement="top" title="إذا فئة الرجال غير موجودة أترك الجدول فارغ">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#men">الرجالي</a>
                                </li>
                                <li class="nav-item"  data-bs-toggle="tooltip" data-bs-placement="top" title="إذا فئة النساء غير موجودة أترك الجدول فارغ">
                                    <a class="nav-link" data-bs-toggle="tab" href="#women">النسائي</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="men" role="tabpanel">
                                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/gym/time-table/'.$gym->id) }}">
                                        @csrf
                                        <input type="hidden" name="type" value="men">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table id="kt_create_new_custom_fields" class="table align-middle table-row-dashed fw-bold fs-6 gy-5 dataTable no-footer">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="pt-0 sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">اليوم</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 255px;">الفترة الصباحية</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 255px;">الفترة المسائية</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 100px;">دوام كامل</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 100px;">إجازة</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @if ($men_table)
                                                        @include('gym.time-table',['day_name'=> 'السبت', 'day'=>'sat','gender'=>'m'
                                                        ,'f_if'=> $men_table->sat_f,'l_if'=> $men_table->sat_l])
                                                        @include('gym.time-table',['day_name'=> 'الأحد', 'day'=>'sun','gender'=>'m'
                                                        ,'f_if'=> $men_table->sun_f,'l_if'=> $men_table->sun_l])
                                                        @include('gym.time-table',['day_name'=> 'لإثنين', 'day'=>'mon','gender'=>'m'
                                                        ,'f_if'=> $men_table->mon_f,'l_if'=> $men_table->mon_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الثلاثاء', 'day'=>'tue','gender'=>'m'
                                                        ,'f_if'=> $men_table->tue_f,'l_if'=> $men_table->tue_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الأربعاء', 'day'=>'wed','gender'=>'m'
                                                        ,'f_if'=> $men_table->wed_f,'l_if'=> $men_table->wed_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الخميس', 'day'=>'thu','gender'=>'m'
                                                        ,'f_if'=> $men_table->thu_f,'l_if'=> $men_table->thu_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الجمعة', 'day'=>'fri','gender'=>'m'
                                                        ,'f_if'=> $men_table->fri_f,'l_if'=> $men_table->fri_l]) 
                                                    @else
                                                        @include('gym.time-table',['day_name'=> 'السبت', 'day'=>'sat','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الأحد', 'day'=>'sun','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'لإثنين', 'day'=>'mon','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الثلاثاء', 'day'=>'tue','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الأربعاء', 'day'=>'wed','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الخميس', 'day'=>'thu','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الجمعة', 'day'=>'fri','gender'=>'m'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                    @endif
                                                    
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                        <!--begin::Action buttons-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">حفظ</span>
                                                <span class="indicator-progress">إنتظر... 
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Action buttons-->
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="women" role="tabpanel">
                                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/gym/time-table/'.$gym->id) }}">
                                        @csrf       
                                        <input type="hidden" name="type" value="women">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table id="kt_create_new_custom_fields" class="table align-middle table-row-dashed fw-bold fs-6 gy-5 dataTable no-footer">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="pt-0 sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">اليوم</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 255px;">الفترة الصباحية</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 255px;">الفترة المسائية</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 100px;">دوام كامل</th>
                                                        <th class="pt-0 sorting_disabled text-center" rowspan="1" colspan="1" style="width: 100px;">إجازة</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @if ($women_table)
                                                        @include('gym.time-table',['day_name'=> 'السبت', 'day'=>'sat','gender'=>'w'
                                                        ,'f_if'=> $women_table->sat_f,'l_if'=> $women_table->sat_l])           
                                                        @include('gym.time-table',['day_name'=> 'الأحد', 'day'=>'sun','gender'=>'w'
                                                        ,'f_if'=> $women_table->sun_f,'l_if'=> $women_table->sun_l]) 
                                                        @include('gym.time-table',['day_name'=> 'لإثنين', 'day'=>'mon','gender'=>'w'
                                                        ,'f_if'=> $women_table->mon_f,'l_if'=> $women_table->mon_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الثلاثاء', 'day'=>'tue','gender'=>'w'
                                                        ,'f_if'=> $women_table->tue_f,'l_if'=> $women_table->tue_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الأربعاء', 'day'=>'wed','gender'=>'w'
                                                        ,'f_if'=> $women_table->wed_f,'l_if'=> $women_table->wed_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الخميس', 'day'=>'thu','gender'=>'w'
                                                        ,'f_if'=> $women_table->thu_f,'l_if'=> $women_table->thu_l]) 
                                                        @include('gym.time-table',['day_name'=> 'الجمعة', 'day'=>'fri','gender'=>'w'
                                                        ,'f_if'=> $women_table->fri_f,'l_if'=> $women_table->fri_l]) 
                                                    @else
                                                        @include('gym.time-table',['day_name'=> 'السبت', 'day'=>'sat','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الأحد', 'day'=>'sun','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'لإثنين', 'day'=>'mon','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الثلاثاء', 'day'=>'tue','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الأربعاء', 'day'=>'wed','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الخميس', 'day'=>'thu','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                        @include('gym.time-table',['day_name'=> 'الجمعة', 'day'=>'fri','gender'=>'w'
                                                        ,'f_if'=> '','l_if'=> ''])
                                                     @endif
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--begin::Action buttons-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">حفظ</span>
                                                <span class="indicator-progress">إنتظر... 
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Action buttons-->
                                    </form>
                                <!--end::Table wrapper-->
                                </div>
                            </div>
                        </div>
                            <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
    </div>
</div>
@endsection
@section('Javascript')
    <script src="{{ asset("assets/js/time-table.js") }}"></script>
@endsection