									
									<!--begin::Widget 1-->
									<div class="row mb-5 mb-xl-8 g-5 g-xl-8">
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column mb-6 mt-3">
														<span class="card-label fw-bolder fs-2x  text-primary noselect">
															{{ Auth::user()->id-(Auth::user()->gym_id*10000); }}
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">رقم المعرف</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column @if ($start_at == null) mb-8 mt-4 @else mb-6 mt-3 @endif ">
														<span class="card-label fw-bolder @if ($start_at == null) fs-1x @else fs-2x @endif   text-primary noselect">@if ($start_at == null) غير مشترك @else {{ $start_at }} @endif</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">تاريخ الإشتراك</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column mb-6 mt-3">
														<span class="card-label fw-bolder fs-2x  text-primary noselect">
															{{ $wallet }}
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">رصيد المحفظة</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column mb-6 mt-3">
														<span class="card-label fw-bolder fs-2x  text-primary noselect">
															 @if ($arrival)
																{{ $arrival }}
															 @else
																--
															 @endif
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">أخر حضور</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column mb-6 mt-3">
														<span class="card-label fw-bolder fs-2x  text-primary noselect">
															 @if ($coach)
																{{ $coach }}
															 @else
																--
															 @endif
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">المدرب</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-6">
											<!--begin::Card-->
											<div class="card card-stretch w-175px h-150px">
												<span class="row text-gray-800 icon-gray-400 bg-body flex-column justfiy-content-center  align-items-start text-start mw-100 p-5 m-2">
													<h4 class="card-title d-flex align-items-start flex-column mb-6 mt-3">
														<span class="card-label fw-bolder fs-2x  text-primary noselect">
															 @if ($package)
																{{ $package }}
															 @else
																--
															 @endif
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">نوع الإشتراك</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Widget 1-->
									