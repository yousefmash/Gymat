@extends('index')
<?php $packages_num = 0; ?>
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">السجل المالي للمشترك</li>
@endsection

@section('admin_content')

<div id="kt_content_container" class="container-xxl">
	<div class="d-flex flex-column flex-lg-row">
        @include('users.user-details',['user_wallet'=>true])
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name').'/contract/store/'.$user->id) }}">
                @csrf
                <input hidden name='package_value' id="package_value" value="0">
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
                        <div class="fw-bold text-gray-400 mb-3">إختر الباقة المناسبة:
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-original-title="تظهر الباقات المتوفر سعرها في رصيد المشترك" aria-label="تظهر الباقات المتوفر سعرها في رصيد المشترك"></i>
                        </div>
                        <!--begin::Radio group-->
                        <div data-kt-buttons="true">
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 400px; width: 100%;">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_edit_order_product_table" style="width: 100%;">
                                    <thead>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($packages as $p)
                                        @if ($p->price <= $total)
                                            <?php $packages_num += 1;?>
                                            <tr>
                                                <!--begin::Radio button-->
                                                <label class="btn btn-outline btn-outline-dashed d-flex flex-stack text-start p-6 mb-5">
                                                    <!--end::Description-->
                                                    <div class="d-flex align-items-center me-2">
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                                                            <input class="form-check-input" type="radio" title="{{ $p->price }}" name="package" value="{{ $p->id }}"/>
                                                        </div>
                                                        <!--end::Radio-->

                                                        <!--begin::Info-->
                                                        <div class="flex-grow-1">
                                                            <h2 class="d-flex align-items-center fs-3 fw-bolder flex-wrap">
                                                                {{ $p->name }}
                                                                <span class="badge badge-light-success ms-2 fs-7">
                                                                    {{ $p->duration }}
                                                                </span>
                                                                <span class="badge badge-light-primary ms-2 fs-7">
                                                                    {{ $p->workout_days }} في الأسبوع
                                                                </span>
                                                            </h2>
                                                            <div class="fw-bold opacity-50 mw-sm-200px">
                                                                @if ($p->fitness == 1) لياقة , @endif
                                                                @if ($p->bodybuilding = 1) حديد , @endif
                                                                @if ($p->sauna > 0) ساونا: {{ $p->sauna }} , @endif
                                                                @if ($p->steam > 0) بخار: {{ $p->steam }} , @endif
                                                                @if ($p->food_table == 1) جدول غذائي  @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Description-->

                                                    <!--begin::Price-->
                                                    <div class="ms-5">
                                                        <span class="mb-2">₪</span>
                                                        <span class="fs-2x fw-bolder">
                                                            {{ $p->price }}
                                                        </span>
                                                        <span class="fs-7 opacity-50">/
                                                            <span data-kt-element="period">{{ $p->duration }}</span>
                                                        </span>
                                                    </div>
                                                    <!--end::Price-->
                                                </label>
                                                <!--end::Radio button-->
                                            </tr>
                                        @endif
                                        @endforeach
                                        @if ($packages_num == 0)
                                            <div class="alert alert-danger">
                                                <h4 class="mb-1 text-dark">لا يوجد رصيد كافي للتسجيل</h4>
                                            </div>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Radio group-->
                </div>
                <!--end::Card body-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm003.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M18 22H6C5.4 22 5 21.6 5 21V8C6.6 6.4 7.4 5.6 9 4H15C16.6 5.6 17.4 6.4 19 8V21C19 21.6 18.6 22 18 22ZM12 5.5C11.2 5.5 10.5 6.2 10.5 7C10.5 7.8 11.2 8.5 12 8.5C12.8 8.5 13.5 7.8 13.5 7C13.5 6.2 12.8 5.5 12 5.5Z" fill="currentColor"/>
                                <path d="M12 7C11.4 7 11 6.6 11 6V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V6C13 6.6 12.6 7 12 7ZM15.1 10.6C15.1 10.5 15.1 10.4 15 10.3C14.9 10.2 14.8 10.2 14.7 10.2C14.6 10.2 14.5 10.2 14.4 10.3C14.3 10.4 14.3 10.5 14.2 10.6L9 19.1C8.9 19.2 8.89999 19.3 8.89999 19.4C8.89999 19.5 8.9 19.6 9 19.7C9.1 19.8 9.2 19.8 9.3 19.8C9.5 19.8 9.6 19.7 9.8 19.5L15 11.1C15 10.8 15.1 10.7 15.1 10.6ZM11 11.6C10.9 11.3 10.8 11.1 10.6 10.8C10.4 10.6 10.2 10.4 10 10.3C9.8 10.2 9.50001 10.1 9.10001 10.1C8.60001 10.1 8.3 10.2 8 10.4C7.7 10.6 7.49999 10.9 7.39999 11.2C7.29999 11.6 7.2 12 7.2 12.6C7.2 13.1 7.3 13.5 7.5 13.9C7.7 14.3 7.9 14.5 8.2 14.7C8.5 14.9 8.8 14.9 9.2 14.9C9.8 14.9 10.3 14.7 10.6 14.3C11 13.9 11.1 13.3 11.1 12.5C11.1 12.3 11.1 11.9 11 11.6ZM9.8 13.8C9.7 14.1 9.5 14.2 9.2 14.2C9 14.2 8.8 14.1 8.7 14C8.6 13.9 8.5 13.7 8.5 13.5C8.5 13.3 8.39999 13 8.39999 12.6C8.39999 12.2 8.4 11.9 8.5 11.7C8.5 11.5 8.6 11.3 8.7 11.2C8.8 11.1 9 11 9.2 11C9.5 11 9.7 11.1 9.8 11.4C9.9 11.7 10 12 10 12.6C10 13.2 9.9 13.6 9.8 13.8ZM16.5 16.1C16.4 15.8 16.3 15.6 16.1 15.4C15.9 15.2 15.7 15 15.5 14.9C15.3 14.8 15 14.7 14.6 14.7C13.9 14.7 13.4 14.9 13.1 15.3C12.8 15.7 12.6 16.3 12.6 17.1C12.6 17.6 12.7 18 12.9 18.4C13.1 18.7 13.3 19 13.6 19.2C13.9 19.4 14.2 19.5 14.6 19.5C15.2 19.5 15.7 19.3 16 18.9C16.4 18.5 16.5 17.9 16.5 17.1C16.7 16.8 16.6 16.4 16.5 16.1ZM15.3 18.4C15.2 18.7 15 18.8 14.7 18.8C14.4 18.8 14.2 18.7 14.1 18.4C14 18.1 13.9 17.7 13.9 17.2C13.9 16.8 13.9 16.5 14 16.3C14.1 16.1 14.1 15.9 14.2 15.8C14.3 15.7 14.5 15.6 14.7 15.6C15 15.6 15.2 15.7 15.3 16C15.4 16.2 15.5 16.6 15.5 17.2C15.5 17.7 15.4 18.1 15.3 18.4Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <h2 class="ml-3">بيانات الإشتراك</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <!--begin::Table wrapper-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    <tr>
                                        <td>تاريخ بداية الإشتراك
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-original-title="ترك الخانة فارغة للبدأ من تاريخ الحركة" aria-label="ترك الخانة فارغة للبدأ من تاريخ الحركة"></i>
                                        </td>
                                        <td>
                                            <input class="form-control form-control-solid T-date" placeholder="أدخل تاريخ بداية الإشتراك" id="start_at" name="start_at"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>المدرب المسؤول
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-original-title="يمكن تغييره لاحقاٌ" aria-label="يمكن تغييره لاحقاٌ"></i>
                                        </td>
                                        <td>
                                            <select class="form-select"  name="coach" data-control="select2" data-placeholder="إختر">
                                                <option></option>
                                                @foreach ($coachs as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>الخصم</td>
                                        <td><input id="discount_input" class="form-control form-control-lg form-control-solid" type="text" placeholder="0" value="0" name="discount" autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td>ملاحظة</td>
                                        <td>
                                            <textarea class="form-control form-control-solid rounded-3" name="note" rows="1"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">سعر الإشتراك</td>
                                        <td class="text-end">₪<span id="package_price">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">الخصم</td>
                                        <td class="text-end">₪<span id="discount_value">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="fs-3 text-dark text-end">المجموع</td>
                                        <td class="text-dark fs-3 fw-boldest text-end">₪<span id="total_price">0.00</span></td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            <div class="d-flex flex-column ">
                                <input type="submit" class="btn btn-primary d-flex justify-content-center" type="submit" value="حفظ">
                            </div>
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                </div>
                <!--end::Card body-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@include('financial.edit-receipt')

@endsection
@section('Javascript')
<script>
document.getElementById("discount_input").addEventListener("change", discountValue);

if (document.querySelector('input[name="package"]')) {
  document.querySelectorAll('input[name="package"]').forEach((elem) => {
    elem.addEventListener("change", function(event) {
      var item = event.target.title;
      var package_price = document.getElementById("package_price");
      var package_value = document.getElementById("package_value");
      package_value.value = item;
      package_price.innerHTML = item;
      total_value();
    });
  });
}

function discountValue() {
  var discount_value = document.getElementById("discount_value");
  var discount_input = document.getElementById("discount_input");
  discount_value.innerHTML  = parseInt(discount_input.value);
  total_value();
}
function total_value() {
  var discount_value = document.getElementById("discount_value");
  var package_price = document.getElementById("package_price");
  var total_price = document.getElementById("total_price");
  total_price.innerHTML = parseInt(package_price.innerHTML)-parseInt(discount_value.innerHTML);
}
</script>
<script>
    $(".T-date").flatpickr({
    });
</script>
@endsection
