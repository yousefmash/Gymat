									
									<!--begin::Engage widget 1-->
									<div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px bg-primary mb-5 mb-xl-8" style="background-color: ;background-position: 100% 50px;background-size: 500px auto;background-image:url('assets/media/misc/city.png')">
										<div id="carousel" class="carousel carousel-custom slide m-5 text-white" data-bs-ride="carousel" data-bs-interval="8000">
											<!--begin::Heading-->
											<div class="d-flex align-items-center justify-content-between flex-wrap">
												<!--begin::Label-->
												<span class="fs-2x fw-bolder pe-2">ملاحظات</span>
												<!--end::Label-->
										
												<!--begin::Carousel Indicators-->
												<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
													@php
														$i = 0;
													@endphp
													@foreach ($notices as $n)
														<li data-bs-target="#carousel" data-bs-slide-to="{{ $i }}" class="ms-1 @if ($i == 0) active @endif"></li>
													@endforeach
												</ol>
												<!--end::Carousel Indicators-->
											</div>
											<!--end::Heading-->
										
											<!--begin::Carousel-->
											<div class="carousel-inner pt-8">
												@foreach ($notices as $n)
													
												@endforeach
												<!--begin::Item-->
												<div class="carousel-item @if ($i == 0) active @endif">
													...
												</div>
												<!--end::Item-->
											</div>
											<!--end::Carousel-->
										</div>
									</div>
									<!--end::Engage widget 1-->
									