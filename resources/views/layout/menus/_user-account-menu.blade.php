										
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<div class="symbol symbol-50px me-5"></div>
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5">
															{{ Auth::user()->name  }}
														</div>
													</div>
													<!--end::Username-->
												</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="?page=account/overview" class="menu-link px-5">My Profile</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="{{ route('logout') }}" 
												onclick="event.preventDefault();
												document.getElementById('logout-form').submit();" 
												class="menu-link px-5">Sign Out</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
													@csrf
												</form>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::User account menu-->