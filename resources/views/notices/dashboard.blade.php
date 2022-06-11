@extends('index')

@section('Stylesheets')
<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
<ol class="breadcrumb text-muted fs-6 fw-bold">
	<li class="breadcrumb-item"><a href="{{url( Cookie::get('gym_name')."/dashboard")}}" class="px-3">الرئيسية</a></li>
	<li class="breadcrumb-item px-3 text-muted">الإشعارات</li>
</ol>
@endsection

@section('admin_content')
<!--<a class="btn btn-primary" >إشعار جديد</a> -->

<div id="kt_content_container" class="container-xxl">
    <!--end::Card-->
    <div class="card mb-6 mb-xl-9">
        <!--begin::Header-->
        <div class="card-header">
            <!--begin::Title-->
            <div class="card-title">
                <h2>الإشعارات</h2>
            </div>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_notice">إضافة إشعار</button>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Card body-->
        <div class="card-body pb-5">
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary ms-3 active" data-bs-toggle="tab" role="tab" href="#active_table" aria-selected="false">فعالة</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab" href="#Expired_table" aria-selected="true">إنتهت</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--begin::Tab Content-->
            <div id="tab_content" class="tab-content">
                <!--begin::Tab panel-->
                <div id="active_table" class="py-0 tab-pane fade active show" role="tabpanel">
                    <!--begin::Table-->
                    <div id="wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer users_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px">الإشعار</th>
                                        <th style="max-width: 100px">المشتركين</th>
                                        <th>المرسل</th>
                                        <th>تاريخ الإرسال</th>
                                        <th>ينتهي بـ</th>
                                        <th class="text-end">حذف</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($notices as $n)
                                        @if ($n->active==1)
                                        <!--begin::row-->
                                        <tr>
                                            <!--begin::title-->
                                            <td class="sorting_1">
                                                <div class="d-flex">
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <h5>{{ $n->title }}</H5>
                                                        <!--end::Title-->
                                                        <!--begin::content-->
                                                        <div class="text-muted fs-7 fw-bolder">{{ $n->content }}</div>
                                                        <!--end::content-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::title-->
                                            <!--begin::target-->
                                            <td>{{ $n->target }}</td>
                                            <!--end::target-->
                                            <!--begin::admin-->
                                            <td>{{ $n->admin_name }}</td>
                                            <!--end::admin-->
                                            <!--begin::end_at-->
                                            <td>{{ $n->start_at}}</td>
                                            <!--end::end_at-->
                                            <!--begin::end_at-->
                                            <td>{{ $n->end_at}}</td>
                                            <!--end::end_at-->
                                            <!--begin::delet-->
                                            <td class="text-end">
                                                <button type="button" data-item="{{$n->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_notice">
                                                    <i class="bi bi-trash-fill fs-7"></i>
                                                </button>
                                            </td>
                                            <!--end::delet-->
                                        </tr>
                                        <!--end::row-->
                                        @endif
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div id="Expired_table" class="py-0 tab-pane fade" role="tabpanel">
                    <!--begin::Table-->
                    <div id="wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer users_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px">الإشعار</th>
                                        <th style="max-width: 100px">المشتركين</th>
                                        <th>المرسل</th>
                                        <th>تاريخ الإرسال</th>
                                        <th>الحالة</th>
                                        <th class="text-end">حذف</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($notices as $n)
                                        @if ($n->active==0)
                                        <!--begin::row-->
                                        <tr>
                                            <!--begin::title-->
                                            <td class="sorting_1">
                                                <div class="d-flex">
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <h5>{{ $n->title }}</H5>
                                                        <!--end::Title-->
                                                        <!--begin::content-->
                                                        <div class="text-muted fs-7 fw-bolder">{{ $n->content }}</div>
                                                        <!--end::content-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::title-->
                                            <!--begin::target-->
                                            <td>{{ $n->target }}</td>
                                            <!--end::target-->
                                            <!--begin::admin-->
                                            <td>{{ $n->admin_name }}</td>
                                            <!--end::admin-->
                                            <!--begin::end_at-->
                                            <td>{{ $n->start_at}}</td>
                                            <!--end::end_at-->
                                            <!--begin::end_at-->
                                            <td>{{ $n->end_at}}</td>
                                            <!--end::end_at-->
                                            <!--begin::delet-->
                                            <td class="text-end">
                                                <button type="button" data-item="{{$n->id}}" class="btn btn-icon btn-danger modal-class" data-bs-toggle="modal" data-bs-target="#destroy_notice">
                                                    <i class="bi bi-trash-fill fs-7"></i>
                                                </button>
                                            </td>
                                            <!--end::delet-->
                                        </tr>
                                        <!--end::row-->
                                        @endif
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Tab panel-->
            </div>
            <!--end::Tab Content-->
        </div>
        <!--end::Card body-->
    </div>
</div>
@include('notices.add-notice')
<div class="modal fade" tabindex="-1" id="destroy_notice">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
				<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					هل تريد حذف الإشعار ؟
				</label>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<form action="#" id='lineitem' method="post">
					@csrf
					<input type="submit" class="btn btn-danger" type="submit" value="حذف">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('Javascript')
<script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>
<script src="{{ asset("assets/js/custom.datatables.js")}}"></script>
<script src="{{ asset("assets/js/time-table.js") }}"></script>
<script>
	$(document).on("click", ".modal-class", function () {
	   var itemid= $(this).attr('data-item');
	   $("#lineitem").attr("action","notices/destroy/"+itemid)
	});
</script>
@endsection