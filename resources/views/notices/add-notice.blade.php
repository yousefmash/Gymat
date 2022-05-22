<div class="modal fade" id="new_notice" tabindex="-1" style="display: none;" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">إضافة إشعار جديد</h2>
				<!--end::Modal title-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-lg-5 my-7">
				<!--begin::Form-->
				<form id="new_notice" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/notices/store') }}">
					@csrf
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="new_notice_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_form_header" data-kt-scroll-wrappers="#new_notice_scroll" data-kt-scroll-offset="300px" style="">
						<!--begin::Input group-->
						<div class="fv-row mb-10 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label ">
								<span class="required">المرسل له</span>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<div class="form-check form-check-custom form-check-solid mb-2">
								<input class="form-check-input" type="radio" value="all"  id="all" name="target"/>
								<label class="form-check-label" for="flexCheckDefault">
									جميع المشتركين
								</label>
							</div>
							<div class="form-check form-check-custom form-check-solid mb-2">
								<input class="form-check-input"  type="radio" value="will_over" id="will_over" name="target"/>
								<label class="form-check-label" for="flexCheckDefault">
									مشتركين ستنتهي فترة إشتراكهم خلال أسبوع
								</label>
							</div>
							<div class="form-check form-check-custom form-check-solid mb-2">
								<input class="form-check-input"  type="radio" value="is_over" id="is_over" name="target"/>
								<label class="form-check-label" for="flexCheckDefault">
									مشتركين إنتهت فترة إشتراكهم
								</label>
							</div>
							<div class="form-check form-check-custom form-check-solid mb-2">
								<input class="form-check-input"  type="radio" value="user" id="user" name="target"/>
								<label class="form-check-label" for="flexCheckDefault">
									مشترك محدد
								</label>
							</div>
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">تفاصيل الإشعار</label>
							<!--end::Label-->
							<!--begin::Table wrapper-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5">
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">العنوان</td>
											<td>
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<input class="form-control form-control-solid" type="text" value="" name="title">
												</label>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">المحتوى</td>
											<td>
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<textarea class="form-control form-control-solid rounded-3" name="content" rows="2"></textarea>												</label>
												</label>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">تاريخ الإرسال
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="أتركه فارغاٌ للإرسال الأن" aria-label="أتركه فارغاٌ للإرسال الأن"></i>
											</td>
											<!--end::Label-->
											<td>
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<input class="form-control form-control-solid T-date" type="text" value="" id="start_at" name="start_at">
												</label>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">تاريخ الإنتهاء</td>
											<!--end::Label-->
											<td>
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<input class="form-control form-control-solid T-date" type="text" value="" id="end_at" name="end_at">
												</label>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr id="user_tr">
											<td class="text-gray-800" id="user_id_title">معرف المشترك
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="يتم الإدخال عن تحديد مشترك محدد" aria-label="يتم الإدخال عن تحديد مشترك محدد"></i>
											</td><!--end::Label-->
											<td>
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<input class="form-control form-control-solid" disabled type="text" value="" id="user_id" name="user_id">
												</label>
											</td>
										</tr>
										<!--end::Table row-->
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table wrapper-->
						</div>
						<!--end::Input group-->
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<input type="submit" class="btn btn-primary" type="submit" value="إرسال">
							<span class="indicator-progress">إنتظر... 
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>