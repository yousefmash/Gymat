@php 
$segment = Request::segment(2); 
$gym_name =  Cookie::get('gym_name');
$gym_logo = Cookie::get('gym_logo');
$user_job = Auth::user()->job_id;
@endphp 
<!--
1-الصفحة الرئيسية
2-صفحة تسجيل الإشتراك
3-السجل المالي
4-الصفحة الشخصية
5-الجدول الغذائي
6-زر حضور وإنصراف
7-الملاحظات
8-مواعيد عمل النادي
9-الدرب الخاص به
-->
<!DOCTYPE html>
<html lang="en" direction="rtl" dir="rtl" style="direction: rtl">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<meta name="description" content="موقع إدارة الصالات الرياضية" />
		<meta name="keywords" content="gym, رياضة, جيم, gymat, webgym, web gym, Laravel, diet, نظام غذائي" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="ar" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset("assets/media/logos/favicon.ico") }}" />
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&amp;display=swap" rel="stylesheet">		
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle-->
		@yield('Stylesheets')
		<link href="{{ asset("assets/plugins/global/2.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/2.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("css/mycss.css") }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading header-fixed aside-fixed aside-secondary-disabled">
		<!--begin::loader-->
		<div class="page-loader">
			<span class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</span>
		</div>
		<!--end::Loader-->

		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Logo-->
					<div class="aside-logo flex-column-auto pt-8" id="kt_aside_logo">
						<div class="d-flex align-items-center flex-column">
							<!--begin::Logo-->
							<div class="mb-4">
								<img alt="Logo" src="{{ asset($gym_logo) }}" class="h-70px mw-125px noselect">
							</div>
							<!--end::Logo-->
							<!--begin::Info-->
							<div class="text-center noselect">
								<!--begin::gymname-->
								<h4 class="text-gray-900">{{ $gym_name }}</h4>
								<!--end::gymname-->
							</div>
							<!--end::Info-->
						</div>
					</div>
					<!--end::Logo-->
					<!--begin::Nav-->
					<div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-7" id="kt_aside_menu">
						<!--begin::Aside menu-->
						<div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
							<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6 my-auto" data-kt-menu="true">
								<div class="menu-item py-3  @if ($segment == "dashboard") here show @endif">
									<a class="menu-link" href="{{url( $gym_name."/dashboard")}}" title="الرئيسية" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon-->
											<span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</a>
								</div>
								<div class="menu-item py-3 @if ($segment == "profile") here show @endif">
									<a class="menu-link" href="{{url( $gym_name."/profile")}}" title="الملف الشخصي" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon-->
											<span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
													<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</a>
								</div>
								<div class="menu-item py-3 @if ($segment == "diet") here show  @endif">
									<a class="menu-link" href="{{url( $gym_name."/diet")}}" title="النظام الغذائي" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon-->
											<span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</a>
								</div>
								<div class="menu-item py-3 @if ($segment == "financial-record") here show @endif">
									<a class="menu-link" href="{{url( $gym_name."/financial-record")}}" title="السجل المالي" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon-->
											<span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20 18H4C3.4 18 3 17.6 3 17V7C3 6.4 3.4 6 4 6H20C20.6 6 21 6.4 21 7V17C21 17.6 20.6 18 20 18ZM12 8C10.3 8 9 9.8 9 12C9 14.2 10.3 16 12 16C13.7 16 15 14.2 15 12C15 9.8 13.7 8 12 8Z" fill="currentColor"/>
													<path d="M18 6H20C20.6 6 21 6.4 21 7V9C19.3 9 18 7.7 18 6ZM6 6H4C3.4 6 3 6.4 3 7V9C4.7 9 6 7.7 6 6ZM21 17V15C19.3 15 18 16.3 18 18H20C20.6 18 21 17.6 21 17ZM3 15V17C3 17.6 3.4 18 4 18H6C6 16.3 4.7 15 3 15Z" fill="currentColor"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
									</a>
								</div>
							</div>
						</div>
						<!--end::Aside menu-->
					</div>
					<!--end::Nav-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
						<!--begin::Menu-->
						<div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-dismiss="click" title="تسجيل الخروج">
							<button type="button" class="btn btn-custom pe-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
										<path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor" />
										<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</button>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Aside-->
				
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header tablet and mobile-->
					<div class="header-mobile py-3">
						<!--begin::Container-->
						<div class="container d-flex flex-stack">
							<!--begin::Aside toggle-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
									<!--begin::Svg Icon-->
									<span class="svg-icon svg-icon-2x me-n1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>
							</div>
							<!--end::Aside toggle-->
							<!--begin::Mobile logo-->
							<a href="?page=index">
								<img alt="Logo" src="{{ asset($gym_logo) }}" class="h-35px" />
							</a>
							<!--end::Mobile logo-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header tablet and mobile-->

					<!--begin::Content-->
					<div class="d-flex flex-column flex-column-fluid mt-8" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							@yield("content")
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="#" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">GYMAT</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		@include('dashboard.error_alert')

		<!--begin::Javascript-->
		<script src="{{ asset("assets/plugins/global/plugins.bundle.js") }}"></script>
		<script src="{{ asset("assets/js/scripts.bundle.js") }}"></script>
		@yield('Javascript')
		@if ($errors->any())
			<script>
				$(document).ready(function(){
					$("#Error-Modal").modal('show');
				});
			</script>
		@endif
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>