					
@extends('index')

@section('admin_content')
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								
								<!--begin::Row-->
								<div class="row gy-5 g-xl-8">
									<!--begin::Col-->
									<div class="col-xl-8">
										<!--layout-partial:partials/widgets-2/tables/_widget-9.html-->
										@include("partials.widgets-2.tables._widget-9")
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">

<!--layout-partial:partials/widgets-2/lists/_widget-5.html-->
@include("partials.widgets-2.lists._widget-2")

									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">

<!--layout-partial:partials/widgets-2/mixed/_widget-7.html-->
@include("partials.widgets-2.mixed._widget-7")


<!--layout-partial:partials/widgets-2/mixed/_widget-10.html-->
@include("partials.widgets-2.mixed._widget-10")

									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--layout-partial:partials/widgets-2/mixed/_widget-2.html-->
										@include("partials.widgets-2.mixed._widget-2")
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
@endsection							