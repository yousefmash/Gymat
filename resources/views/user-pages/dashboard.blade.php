@extends('index2')
@section('content')
							<!--begin::Row-->
							<div class="row g-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Widget-->
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
														<span class="card-label fw-bolder fs-1x  text-primary noselect">
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
														<span class="card-label fw-bolder fs-1x  text-primary noselect text-nowrap">
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
													<h4 class="card-title d-flex align-items-start flex-column @if ($start_at == null) mb-8 mt-4 @else mb-6 mt-3 @endif ">
														<span class="card-label fw-bolder  fs-1x text-primary noselect">@if ($start_at == null) غير مشترك @else {{ $start_at }} @endif</span>
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
														<span class="card-label fw-bolder fs-1x  text-primary noselect">
															{{ Cookie::get('gym_name') }}
														</span>
													</h4>
													<span class="fs-4 fw-bolder noselect">الصالة الرياضية</span>
												</span>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Widget-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-8">
									<!--begin::Col-->
									<div class="col-xl-12">
										<div class="row gx-5 gx-xl-10">
											<!--begin::Col-->
											<div class="col-xl-5  mb-5 mb-xl-0 ">
												<!--begin::Widget-->
												<div class="card card-xl-stretch-50 mb-2 mb-xl-8 h-325px">
													<!--begin::Header-->
													<div class="card-header pt-3 border-0">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label fw-bolder fs-3 mb-1">الحركات المالية</span>
															<span class="text-muted mt-1 fw-bold fs-7">أخر الحركات المالية</span>
														</h3>
														<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="عرض الحركات المالية">
															<a href="{{url( Cookie::get('gym_name')."/sessions")}}" class="btn btn-sm btn-light btn-active-primary">
														عرض الحركات</a>
														</div>
													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body  pb-2 pt-0">
															<div class="table-responsive">
																<!--begin::Table-->
																<table class="table table-row-dashed table-row-gray-300 gs-0 gy-4">
																	<!--begin::Table body-->
																	<tbody>
																		@if ($latest_movements->count())
																			@foreach ($latest_movements as $movement)
																				<tr>
																					<td>
																						<p class="text-dark fw-bolder d-block fs-6">				
																							@if ($movement->movement_type == 'withdraw')
																							صرف
																							@elseif ($movement->movement_type == 'deposit')
																								إيداع
																							@else
																								ترحيل رصيد
																							@endif
																						</p>
																					</td>
																					<td>
																						<span class="text-muted fw-bold text-muted d-block fs-7">
																							@if ($movement->movement_type != 'collect')
																							{{ $movement->user_name }}
																							@endif
																						</span>
																					</td>
																					<td class="text-end d-flex border-0">
																						@if ($movement->movement_type == 'withdraw')
																							<!--begin::Svg Icon-->
																							<span class="svg-icon svg-icon-2 svg-icon-danger me-2">
																								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																									<rect opacity="0.5" x="7.05026" y="15.5355" width="13" height="2" rx="1" transform="rotate(-45 7.05026 15.5355)" fill="currentColor"></rect>
																									<path d="M9.17158 14.0284L9.17158 8.11091C9.17158 7.52513 8.6967 7.05025 8.11092 7.05025C7.52513 7.05025 7.05026 7.52512 7.05026 8.11091L7.05026 15.9497C7.05026 16.502 7.49797 16.9497 8.05026 16.9497L15.8891 16.9497C16.4749 16.9497 16.9498 16.4749 16.9498 15.8891C16.9498 15.3033 16.4749 14.8284 15.8891 14.8284L9.97158 14.8284C9.52975 14.8284 9.17158 14.4703 9.17158 14.0284Z" fill="currentColor"></path>
																								</svg>
																							</span>
																							<!--end::Svg Icon-->
																						@elseif ($movement->movement_type == 'deposit')
																							<!--begin::Svg Icon-->
																							<span class="svg-icon svg-icon-2 svg-icon-success me-2">
																								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																									<rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1" transform="rotate(135 16.9497 8.46448)" fill="currentColor"></rect>
																									<path d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z" fill="currentColor"></path>
																								</svg>
																							</span>
																							<!--end::Svg Icon-->
																						@else
																							<!--begin::Svg Icon-->
																							<span class="svg-icon svg-icon-muted svg-icon-2   me-2">
																								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																									<path d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="currentColor"/>
																								</svg>
																							</span>
																							<!--end::Svg Icon-->
																						@endif

																						<!--begin::Number-->
																						<span class="text-gray-900 fw-boldest fs-6">{{  $movement->value }}</span>
																						<!--end::Number-->
																					</td>
																				</tr>
																			@endforeach
																		@else
																			<tr>
																				<td>
																					<p class="text-dark fw-bolder d-block fs-6"><p class="text-dark fw-bolder d-block fs-6">لا يوجد حركات</p>
																				</td>
																			</tr>
																		@endif
																		
																	</tbody>
																	<!--end::Table body-->
																</table>
																<!--end::Table-->
															</div>
															<div class="text-gray-700 fw-bold fs-6 me-2">

															</div>
															<div class=" ">
																
															</div>
														</div>
													<!--end::Body-->
												</div>
												<!--end::Widget-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-xl-4 mb-5 mb-xl-0 ">
												<!--begin::Card-->
												<div class="card card-flush h-325px">
													@if ($package)
														<!--begin::Card header-->
														<div class="card-header">
															<!--begin::Card title-->
															<div class="card-title">
																<h2>{{ $package->name }}</h2>
															</div>
															<!--end::Card title-->
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body scroll pt-1">
															<!--begin::Permissions-->
															<div class="d-flex flex-column text-gray-600">
																@if ($package->workout_days )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>عدد أيام التمارين : {{ $package->workout_days }}</div>
																@endif
																@if ($package->duration )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>مدة الإشتراك : {{ $package->duration  }}</div>
																@endif
																@if ($package->fitness )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>الإشتراك يشمل حصص اللياقة</div>
																@endif
																@if ($package->bodybuilding )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>الإشتراك يشمل صالة الحديد</div>
																@endif
																@if ($package->food_table )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>الإشتراك يشمل جدول غذائي</div>
																@endif
																@if ($package->sauna )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>عدد جلسات الساونا : {{ $package->sauna }}</div>
																@endif
																@if ($package->steam )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>عدد جلسات البخار : {{ $package->steam }}</div>
																@endif
																@if ($package->note )
																	<div class="d-flex align-items-center py-2">
																	<span class="bullet bg-primary me-3"></span>ملاحظة: {{ $package->note }}</div>
																@endif
															</div>
															<!--end::Permissions-->
														</div>
														<!--end::Card body-->
													@else
														<!--begin::Card header-->
														<div class="card-header">
															<!--begin::Card title-->
															<div class="card-title">
																<h2>لا يوجد إشتراك</h2>
															</div>
															<!--end::Card title-->
														</div>
														<!--end::Card header-->
													@endif
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-xl-3">
												<!--begin::Widget-->
												<div class="row mb-5 mb-xl-4 g-5 g-xl-8">
													<!--begin::Col-->
													<div class="col-12">
														<!--begin::Card-->
														<div class="card card-stretch">
															<!--begin::Link-->
															<a href="?page=apps/projects/users" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
																<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
																<span class="svg-icon svg-icon-3x mb-5">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"/>
																		<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"/>
																		<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"/>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<span class="fs-5 fw-bolder">تجديد الإشتراك</span>
															</a>
															<!--end::Link-->
														</div>
														<!--end::Card-->
													</div>
													<!--end::Col-->			
													<!--begin::Col-->
													<div class="col-12">
														<!--begin::Card-->
														<div class="card card-stretch">
															<!--begin::Link-->
															<a href="?page=apps/projects/users" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
																<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
																<span class="svg-icon svg-icon-3x mb-5">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"/>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<span class="fs-5 fw-bolder">تجديد الجدول</span>
															</a>
															<!--end::Link-->
														</div>
														<!--end::Card-->
													</div>
													<!--end::Col-->									
												</div>
												<!--end::Widget-->
											</div>
											<!--end::Col-->
										</div>
									</div>
									<!--end::Col-->
									<div class="col-xl-12 mb-xl-10">
										<!--begin::Slider Widget 1-->
										<div id="carousel" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100 bg-primary" data-bs-ride="carousel" data-bs-interval="5000">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<h4 class="card-title d-flex align-items-start flex-column">
													<span class="card-label fw-bolder fs-2x text-white">ملاحظات</span>
												</h4>
												<!--end::Title-->
												<!--begin::Toolbar-->
												<div class="card-toolbar">
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-white">
														@for ($i = 0 ; $i < count($notices); $i++ )
															<li data-bs-target="#carousel" data-bs-slide-to="{{ $i }}" class="ms-1 @if ($i == 0) active @endif" @if ($i == 0) aria-current="true" @endif ></li>
														@endfor
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-6">
												<!--begin::Carousel-->
												<div class="carousel-inner mt-n5">
													@php
														$x = 0;
													@endphp
													@foreach ($notices as $n)
														<!--begin::Item-->
														<div class="carousel-item  @if ($x == 0) show active @endif">
															<!--begin::Wrapper-->
															<div class="d-flex align-items-center mb-5">
																<!--begin::Info-->
																<div class="m-0">
																	<!--begin::Subtitle-->
																	<h4 class="fw-bolder text-gray-800 mb-3">{{  $n->title }}</h4>
																	<!--end::Subtitle-->
																	<!--begin::Items-->
																	<div class="d-flex d-grid gap-5">
																		<!--begin::Item-->
																		<div class="d-flex flex-column flex-shrink-0 me-4">
																			<!--begin::Section-->
																			<span class="d-flex align-items-center fs-7 fw-bolder text-white mb-2">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
																			<span class="svg-icon svg-icon-6 svg-icon-dark me-2">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="currentColor"/>
																					<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="currentColor"/>
																					<path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="currentColor"/>
																					<path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="currentColor"/>
																				</svg>
																			</span>
																			<!--end::Svg Icon-->{{ $n->content }}</span>
																			<!--end::Section-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Items-->
																</div>
																<!--end::Info-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Item-->
														@php
															$x += 1;
														@endphp
													@endforeach
												</div>
												<!--end::Carousel-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Slider Widget 1-->
									</div>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->

						@endsection