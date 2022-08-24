<div class="modal fade" id="add_form" tabindex="-1" style="display: none;" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">إضافة باقة صالة رياضية جديدة</h2>
				<!--end::Modal title-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-lg-5 my-7">
				<!--begin::Form-->
				<form id="add_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( 'admin/gym-package/store') }}">
					@csrf
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_form_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_form_header" data-kt-scroll-wrappers="#add_form_scroll" data-kt-scroll-offset="300px" style="">
						<!--begin::Input group-->
						<div class="fv-row mb-10 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">
								<span class="required">إسم الباقة</span>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="أدخل إسم الباقة" name="name">
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Input group-->
						<!--begin::Permissions-->
						<div class="fv-row">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">تفاصيل الباقة</label>
							<!--end::Label-->
							<!--begin::Table wrapper-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5">
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">سعر الإشتراك
											<td>
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="" name="price">
													</label>
												</div>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">عدد المشتركين
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="عدد الأيام التي يمكن للصالة الرياضية تسجيلها" aria-label="عدد الأيام التي يمكن للصالة الرياضية تسجيلها"></i></td>
											<td>
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="" name="users_number">
													</label>
												</div>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">مدة الإشتراك
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="مدة الإشتراك بالأيام" aria-label="مدة الإشتراك بالأيام"></i></td>
											</td>
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-control form-control-solid" type="text" value="" name="duration">
													</label>
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800">ملاحظات
											<!--end::Label-->
											<!--begin::Options-->
											<td>
												<!--begin::Checkbox-->
												<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
													<textarea class="form-control form-control-solid rounded-3" name="note" rows="4"></textarea>
												</label>
												<!--end::Checkbox-->
											</td>
											<!--end::Options-->
										</tr>
										<!--end::Table row-->
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table wrapper-->
						</div>
						<!--end::Permissions-->
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<input type="submit" class="btn btn-primary" type="submit" value="حفظ">
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