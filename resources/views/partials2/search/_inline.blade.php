									
									<!--begin::Search-->
									<div id="kt_header_search" class="header-search d-flex align-items-center w-lg-250px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="false" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">

<!--layout-partial:partials/search/partials/_form-inline.html-->
@include("partials2.search.partials._form-inline")

										<!--begin::Menu-->
										<div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown w-300px w-md-350px py-7 px-7 overflow-hidden">
											<!--begin::Wrapper-->
											<div data-kt-search-element="wrapper">

<!--layout-partial:partials/search/partials/_results.html-->
@include("partials2.search.partials._results")


<!--layout-partial:partials/search/partials/_main.html-->
@include("partials2.search.partials._main")


<!--layout-partial:partials/search/partials/_empty.html-->
@include("partials2.search.partials._empty")

											</div>
											<!--end::Wrapper-->

<!--layout-partial:partials/search/partials/_advanced-options.html-->
@include("partials2.search.partials._advanced-options")


<!--layout-partial:partials/search/partials/_preferences.html-->
@include("partials2.search.partials._preferences")

										</div>
										<!--end::Menu-->
									</div>
									<!--end::Search-->
									