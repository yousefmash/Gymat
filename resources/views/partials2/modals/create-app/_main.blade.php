		
		<!--begin::Modal - Create App-->
		<div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-900px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2>Create App</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body py-lg-10 px-lg-10">
						<!--begin::Stepper-->
						<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
							<!--begin::Aside-->
							<div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
								<!--begin::Nav-->
								<div class="stepper-nav ps-lg-10">
									<!--begin::Step 1-->
									<div class="stepper-item current" data-kt-stepper-element="nav">
										<!--begin::Line-->
										<div class="stepper-line w-40px"></div>
										<!--end::Line-->
										<!--begin::Icon-->
										<div class="stepper-icon w-40px h-40px">
											<i class="stepper-check fas fa-check"></i>
											<span class="stepper-number">1</span>
										</div>
										<!--end::Icon-->
										<!--begin::Label-->
										<div class="stepper-label">
											<h3 class="stepper-title">Details</h3>
											<div class="stepper-desc">Name your App</div>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Step 1-->
									<!--begin::Step 2-->
									<div class="stepper-item" data-kt-stepper-element="nav">
										<!--begin::Line-->
										<div class="stepper-line w-40px"></div>
										<!--end::Line-->
										<!--begin::Icon-->
										<div class="stepper-icon w-40px h-40px">
											<i class="stepper-check fas fa-check"></i>
											<span class="stepper-number">2</span>
										</div>
										<!--begin::Icon-->
										<!--begin::Label-->
										<div class="stepper-label">
											<h3 class="stepper-title">Frameworks</h3>
											<div class="stepper-desc">Define your app framework</div>
										</div>
										<!--begin::Label-->
									</div>
									<!--end::Step 2-->
									<!--begin::Step 3-->
									<div class="stepper-item" data-kt-stepper-element="nav">
										<!--begin::Line-->
										<div class="stepper-line w-40px"></div>
										<!--end::Line-->
										<!--begin::Icon-->
										<div class="stepper-icon w-40px h-40px">
											<i class="stepper-check fas fa-check"></i>
											<span class="stepper-number">3</span>
										</div>
										<!--end::Icon-->
										<!--begin::Label-->
										<div class="stepper-label">
											<h3 class="stepper-title">Database</h3>
											<div class="stepper-desc">Select the app database type</div>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Step 3-->
									<!--begin::Step 4-->
									<div class="stepper-item" data-kt-stepper-element="nav">
										<!--begin::Line-->
										<div class="stepper-line w-40px"></div>
										<!--end::Line-->
										<!--begin::Icon-->
										<div class="stepper-icon w-40px h-40px">
											<i class="stepper-check fas fa-check"></i>
											<span class="stepper-number">4</span>
										</div>
										<!--end::Icon-->
										<!--begin::Label-->
										<div class="stepper-label">
											<h3 class="stepper-title">Billing</h3>
											<div class="stepper-desc">Provide payment details</div>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Step 4-->
									<!--begin::Step 5-->
									<div class="stepper-item" data-kt-stepper-element="nav">
										<!--begin::Line-->
										<div class="stepper-line w-40px"></div>
										<!--end::Line-->
										<!--begin::Icon-->
										<div class="stepper-icon w-40px h-40px">
											<i class="stepper-check fas fa-check"></i>
											<span class="stepper-number">5</span>
										</div>
										<!--end::Icon-->
										<!--begin::Label-->
										<div class="stepper-label">
											<h3 class="stepper-title">Completed</h3>
											<div class="stepper-desc">Review and Submit</div>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Step 5-->
								</div>
								<!--end::Nav-->
							</div>
							<!--begin::Aside-->
							<!--begin::Content-->
							<div class="flex-row-fluid py-lg-5 px-lg-15">
								<!--begin::Form-->
								<form class="form" novalidate="novalidate" id="kt_modal_create_app_form">

<!--layout-partial:partials/modals/create-app/steps/_step-1.html-->
@include("partials2.modals.create-app.steps._step-1")


<!--layout-partial:partials/modals/create-app/steps/_step-2.html-->
@include("partials2.modals.create-app.steps._step-2")


<!--layout-partial:partials/modals/create-app/steps/_step-3.html-->
@include("partials2.modals.create-app.steps._step-3")


<!--layout-partial:partials/modals/create-app/steps/_step-4.html-->
@include("partials2.modals.create-app.steps._step-4")


<!--layout-partial:partials/modals/create-app/steps/_step-5.html-->
@include("partials2.modals.create-app.steps._step-5")

									<!--begin::Actions-->
									<div class="d-flex flex-stack pt-10">
										<!--begin::Wrapper-->
										<div class="me-2">
											<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
											<span class="svg-icon svg-icon-3 me-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
													<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Back</button>
										</div>
										<!--end::Wrapper-->
										<!--begin::Wrapper-->
										<div>
											<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
												<span class="indicator-label">Submit
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
												<span class="svg-icon svg-icon-3 ms-2 me-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
														<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon--></span>
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-3 ms-1 me-0">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon--></button>
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Actions-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Stepper-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Create App-->
		