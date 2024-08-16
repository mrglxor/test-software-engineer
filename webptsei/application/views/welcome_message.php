<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<title>Test PT SEI - Muhamad Farhan</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/favicon.png') ?>" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/rt-plugins.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">
	<script src="<?php echo base_url('assets/js/settings.js') ?>" sync></script>
</head>

<body class=" font-inter dashcode-app" id="body_class">

	<?php if ($this->session->flashdata('message')): ?>
		<div style="
		position: fixed; 
		top: 10%; 
		left: 50%; 
		transform: translate(-50%, -50%); 
		background-color: #2d3748; 
		color: #edf2f7; 
		padding: 10px 20px; 
		border-radius: 8px; 
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
		width: 300px; 
		text-align: center;
		z-index: 1000;
		">
			<div style="display: flex; align-items: center; justify-content: space-between;">
				<span style="font-size: 18px; display: inline-block; margin-right: 10px;">
					<iconify-icon icon="system-uicons:target"></iconify-icon>
				</span>
				<span style="flex: 1;">
					<?php echo $this->session->flashdata('message'); ?>
				</span>
				<span style="font-size: 18px; cursor: pointer;" onclick="this.parentElement.parentElement.style.display='none'">
					<iconify-icon icon="line-md:close"></iconify-icon>
				</span>
			</div>
		</div>
	<?php endif; ?>
	<main class="app-wrapper">
		<div class="sidebar-wrapper group">
			<div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
			<div class="logo-segment">
				<a class="flex items-center" href="">
					<span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">TestMagang</span>
				</a>
				<div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
					<span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
						<div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
					</span>
					<span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
						<div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
					</span>
				</div>
				<button class="sidebarCloseIcon text-2xl">
					<iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
				</button>
			</div>
			<div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
			<div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
				<ul class="sidebar-menu">
					<li class="sidebar-menu-title">MENU</li>
					<li class="<?php echo ($this->uri->segment(1) == '') ? 'active' : ''; ?>">
						<a href="<?php echo site_url(); ?>" class="navItem">
							<span class="flex items-center">
								<iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
								<span>Dashboard</span>
							</span>
						</a>
					</li>
					<li class="sidebar-menu-title">KONTROL DATA</li>
					<li class="<?php echo ($this->uri->segment(1) == 'proyek') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('proyek'); ?>" class="navItem">
							<span class="flex items-center">
								<iconify-icon class=" nav-icon" icon="codicon:github-project"></iconify-icon>
								<span>Proyek</span>
							</span>
						</a>
					</li>
					<li class="<?php echo ($this->uri->segment(1) == 'lokasi') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('lokasi'); ?>" class="navItem">
							<span class="flex items-center">
								<iconify-icon class=" nav-icon" icon="carbon:location"></iconify-icon>
								<span>Lokasi</span>
							</span>
						</a>
					</li>
					<li class="<?php echo ($this->uri->segment(1) == 'tentang') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('tentang'); ?>" class="navItem">
							<span class="flex items-center">
								<iconify-icon class="nav-icon" icon="mdi:about-circle-outline"></iconify-icon>
								<span>Tentang</span>
							</span>
						</a>
					</li>
				</ul>

			</div>
		</div>
		<button class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
			<iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded"></iconify-icon>
			<span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Settings</span>
		</button>

		<div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
			<div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300">
				<div>
					<h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
						Theme customizer
					</h3>
					<p class="block text-sm font-Inter font-light text-[#68768A] dark:text-[#eee]">Customize</p>
				</div>
				<button type="button" class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas"><iconify-icon icon="line-md:close"></iconify-icon></button>
			</div>
			<div class="offcanvas-body flex-grow overflow-y-auto">
				<div class="settings-modal">
					<div class="p-6">

						<h3 class="mt-4">Theme</h3>
						<form class="input-area flex items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
							<div class="input-group flex items-center">
								<input type="radio" id="light" name="theme" value="light" class="themeCustomization-checkInput">
								<label for="light" class="themeCustomization-checkInput-label">Light</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="dark" name="theme" value="dark" class="themeCustomization-checkInput">
								<label for="dark" class="themeCustomization-checkInput-label">Dark</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="semiDark" name="theme" value="semiDark" class="themeCustomization-checkInput">
								<label for="semiDark" class="themeCustomization-checkInput-label">Semi Dark</label>
							</div>
						</form>
					</div>
					<div class="divider"></div>
					<div class="p-6">

						<div class="flex items-center justify-between mt-5">
							<h3 class="!mb-0">Rtl</h3>
							<label id="rtl_ltr" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
								<input type="checkbox" value="" class="sr-only peer">
								<span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-600"></span>
							</label>
						</div>
					</div>
					<div class="divider"></div>
					<div class="p-6">
						<h3>Content Width</h3>
						<div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
							<div class="input-group flex items-center">
								<input type="radio" id="fullWidth" name="content-width" value="fullWidth" class="themeCustomization-checkInput">
								<label for="fullWidth" class="themeCustomization-checkInput-label ">Full Width</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="boxed" name="content-width" value="boxed" class="themeCustomization-checkInput">
								<label for="boxed" class="themeCustomization-checkInput-label ">Boxed</label>
							</div>
						</div>
						<h3 class="mt-4">Menu Layout</h3>
						<div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
							<div class="input-group flex items-center">
								<input type="radio" id="vertical_menu" name="menu_layout" value="vertical" class="themeCustomization-checkInput">
								<label for="vertical_menu" class="themeCustomization-checkInput-label ">Vertical</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="horizontal_menu" name="menu_layout" value="horizontal" class="themeCustomization-checkInput">
								<label for="horizontal_menu" class="themeCustomization-checkInput-label ">Horizontal</label>
							</div>
						</div>
						<div id="menuCollapse" class="flex items-center justify-between mt-5">
							<h3 class="!mb-0">Menu Collapsed</h3>
							<label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
								<input type="checkbox" value="" class="sr-only peer">
								<span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
							</label>
						</div>
						<div id="menuHidden" class="!flex items-center justify-between mt-5">
							<h3 class="!mb-0">Menu Hidden</h3>
							<label id="menuHide" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
								<input type="checkbox" value="" class="sr-only peer">
								<span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
							</label>
						</div>
					</div>
					<div class="divider"></div>
					<div class="p-6">
						<h3>Navbar Type</h3>
						<div class="input-area flex flex-wrap items-center space-x-4 rtl:space-x-reverse">
							<div class="input-group flex items-center">
								<input type="radio" id="nav_floating" name="navbarType" value="floating" class="themeCustomization-checkInput">
								<label for="nav_floating" class="themeCustomization-checkInput-label ">Floating</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="nav_sticky" name="navbarType" value="sticky" class="themeCustomization-checkInput">
								<label for="nav_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="nav_static" name="navbarType" value="static" class="themeCustomization-checkInput">
								<label for="nav_static" class="themeCustomization-checkInput-label ">Static</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="nav_hidden" name="navbarType" value="hidden" class="themeCustomization-checkInput">
								<label for="nav_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
							</div>
						</div>
						<h3 class="mt-4">Footer Type</h3>
						<div class="input-area flex items-center space-x-4 rtl:space-x-reverse">
							<div class="input-group flex items-center">
								<input type="radio" id="footer_sticky" name="footerType" value="sticky" class="themeCustomization-checkInput">
								<label for="footer_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="footer_static" name="footerType" value="static" class="themeCustomization-checkInput">
								<label for="footer_static" class="themeCustomization-checkInput-label ">Static</label>
							</div>
							<div class="input-group flex items-center">
								<input type="radio" id="footer_hidden" name="footerType" value="hidden" class="themeCustomization-checkInput">
								<label for="footer_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-col justify-between min-h-screen">
			<div>
				<div class="z-[9]" id="app_header">
					<div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
						<div class="flex justify-between items-center h-full">
							<div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
								<a href<?php echo site_url(); ?>" class="mobile-logo xl:hidden inline-block">
									<h6>Test</h6>
								</a>
								<button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
									<iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
								</button>
								<button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
									<iconify-icon icon="heroicons-outline:search"></iconify-icon>
									<span class="xl:inline-block hidden ml-3">Search...
									</span>
								</button>

							</div>
							<div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
								<a href="">
									<span class="xl:inline-block hidden">
										<h6>Test</h6>
									</span>
									<span class="xl:hidden inline-block">
										<h6>Test</h6>
									</span>
								</a>
								<button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
									<iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
								</button>

							</div>



							<div class="main-menu">
								<ul>

									<li class="
             menu-item-has-children 
              ">

										<a href="<?php echo site_url(); ?>">
											<div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
												<span class="icon-box">
													<iconify-icon icon=heroicons-outline:home> </iconify-icon>
												</span>
												<div class="text-box">Dashboard</div>
											</div>
										</a>

									</li>

									<li class="
             menu-item-has-children 
              ">

										<a href="javascript:void()">
											<div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
												<span class="icon-box">
													<iconify-icon icon=heroicons-outline:chip> </iconify-icon>
												</span>
												<div class="text-box">Data</div>
											</div>
											<div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
												<iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
											</div>
										</a>

										<ul class="sub-menu">


											<li>
												<a href=<?php echo site_url('proyek') ?>>
													<div class="flex space-x-2 items-start rtl:space-x-reverse">
														<iconify-icon icon=codicon:github-project class="leading-[1] text-base"> </iconify-icon>
														<span class="leading-[1]">
															Proyek
														</span>
													</div>
												</a>
											</li>
											<li>
												<a href=<?php echo site_url('lokasi') ?>>
													<div class="flex space-x-2 items-start rtl:space-x-reverse">
														<iconify-icon icon=carbon:location class="leading-[1] text-base"> </iconify-icon>
														<span class="leading-[1]">
															Lokasi
														</span>
													</div>
												</a>
											</li>
											<li>
												<a href=<?php echo site_url('tentang') ?>>
													<div class="flex space-x-2 items-start rtl:space-x-reverse">
														<iconify-icon icon=mdi:about-circle-outline class="leading-[1] text-base"> </iconify-icon>
														<span class="leading-[1]">
															Tentang
														</span>
													</div>
												</a>
											</li>


										</ul>



									</li>
								</ul>
							</div>
							<div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">


								<div class="relative">
									<button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center" type="button" aria-expanded="false">
										<iconify-icon icon="circle-flags:id" class="mr-0 md:mr-2 rtl:ml-2 text-xl"></iconify-icon>
										<span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
											ID</span>
									</button>

								</div>
								<div>
									<button id="themeMood" class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
										<iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon" icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
										<iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon" icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
									</button>
								</div>

								<div>
									<button id="grayScale" class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
            rounded-full text-[20px] flex flex-col items-center justify-center">
										<iconify-icon class="text-slate-800 dark:text-white text-xl" icon="mdi:paint-outline"></iconify-icon>
									</button>
								</div>

								<div class="md:block hidden w-full">
									<button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
											<img src="<?php echo base_url('assets/img/user.png') ?>" alt="user" class="block w-full h-full object-cover rounded-full">
										</div>
										<span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">Muhamad Farhan</span>
										<svg class="w-[16px] h-[16px] dark:text-white lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
										</svg>
									</button>
									<div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
										<ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
											<li>
												<a href="<?php echo site_url(); ?>" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
													<iconify-icon icon="heroicons-outline:user" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
													<span class="font-Inter">Dashboard</span>
												</a>
											</li>
											<li>
												<a href="<?php echo site_url('tentang'); ?>" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
													<iconify-icon icon="mdi:about-circle-outline" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
													<span class="font-Inter">Tentang</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<button class="smallDeviceMenuController md:hidden block leading-0">
									<iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
					<div class="modal-dialog relative w-auto pointer-events-none top-1/4">
						<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
							<form>
								<div class="relative">
									<input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
									<button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
										<iconify-icon icon="heroicons-solid:search"></iconify-icon>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
					<div class="page-content">
						<div class="transition-all duration-150 container-fluid" id="page_layout">
							<div id="content_layout">

								<div class="lg:col-span-8 col-span-12 space-y-5">
									<div class="card p-6">
										<div class="grid grid-cols-12 gap-5">
											<div class="xl:col-span-8 col-span-12">
												<div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-3">

													<div class="bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
														<div class="text-info-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
															<iconify-icon icon="heroicons-outline:menu-alt-1"></iconify-icon>
														</div>
														<span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
															Total Proyek
														</span>
														<span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
															<?php echo $count_proyek; ?>
														</span>
													</div>

													<div class="bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
														<div class="text-warning-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
															<iconify-icon icon="mdi:location"></iconify-icon>
														</div>
														<span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
															Total Lokasi
														</span>
														<span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
															<?php echo $count_lokasi; ?>
														</span>
													</div>

													<div class="bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-50 text-center">
														<div class="text-primary-500 mx-auto h-10 w-10 flex flex-col items-center justify-center rounded-full bg-white text-2xl mb-4">
															<iconify-icon icon="heroicons-outline:clock"></iconify-icon>
														</div>
														<span class="block text-sm text-slate-600 font-medium dark:text-white mb-1">
															Total Proyek Lokasi
														</span>
														<span class="block mb- text-2xl text-slate-900 dark:text-white font-medium">
															<?php echo $count_proyek_lokasi; ?>
														</span>
													</div>

												</div>
											</div>
											<div class="xl:col-span-4 col-span-12">
												<div class="flex space-x-4 h-full items-center rtl:space-x-reverse">
													<div class="flex-none">
														<div class="h-20 w-20 rounded-full">
															<img src="assets/img/user.png" alt="" class="w-full h-full">
														</div>
													</div>
													<div class="flex-1">
														<h4 class="text-xl font-medium mb-2">
															<span class="block font-light" id="greeting"></span>
															<span class="block">From Muhamad Farhan</span>
														</h4>
														<p class="text-sm dark:text-slate-300">Hallo Kak 🤚 Selamat Datang</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- Table Proyek & Laporan -->
									<div class="card">
										<header class=" card-header noborder">
											<h4 class="card-title">Data Proyek & Lokasi
											</h4>
											<button class="btn inline-flex justify-center btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#proyekModal" onclick="openTambahModal();">Tambah Proyek</button>
										</header>
										<div class="card-body px-6 pb-6">
											<div class="overflow-x-auto -mx-6 dashcode-data-table">
												<span class=" col-span-8  hidden"></span>
												<span class="  col-span-4 hidden"></span>
												<div class="inline-block min-w-full align-middle">
													<div class="overflow-hidden ">
														<table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
															<thead class=" bg-slate-200 dark:bg-slate-700">
																<tr>

																	<th scope="col" class=" table-th ">
																		No
																	</th>

																	<th scope="col" class=" table-th ">
																		Nama Proyek
																	</th>

																	<th scope="col" class=" table-th ">
																		Client
																	</th>

																	<th scope="col" class=" table-th ">
																		Tanggal Mulai
																	</th>

																	<th scope="col" class=" table-th ">
																		Tanggal Selesai
																	</th>

																	<th scope="col" class=" table-th ">
																		Pimpinan Proyek
																	</th>

																	<th scope="col" class=" table-th ">
																		Keterangan
																	</th>

																	<th scope="col" class=" table-th ">
																		Nama Lokasi
																	</th>

																	<th scope="col" class=" table-th ">
																		Negara
																	</th>

																	<th scope="col" class=" table-th ">
																		Provinsi
																	</th>

																	<th scope="col" class=" table-th ">
																		Kota
																	</th>

																	<th scope="col" class=" table-th ">
																		Aksi
																	</th>

																</tr>
															</thead>
															<tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
																<?php $no = 1; ?>
																<?php if (!empty($proyek_data)): ?>
																	<?php foreach ($proyek_data as $proyek): ?>
																		<tr>
																			<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-slate-300"><?php echo $no++; ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo $proyek['namaProyek']; ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo $proyek['client']; ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo date('d/m/Y H:i:s', strtotime($proyek['tglMulai'])); ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo date('d/m/Y H:i:s', strtotime($proyek['tglSelesai'])); ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo $proyek['pimpinanProyek']; ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400"><?php echo $proyek['keterangan']; ?></td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
																				<?php echo isset($proyek['lokasi']['namaLokasi']) ? $proyek['lokasi']['namaLokasi'] : "<p style='color: red;'>dihapus</p>"; ?>
																			</td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
																				<?php
																				echo isset($proyek['lokasi']['negara']) ? $proyek['lokasi']['negara'] : "<p style='color: red;'>dihapus</p>";
																				?>
																			</td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
																				<?php echo isset($proyek['lokasi']['provinsi']) ? $proyek['lokasi']['provinsi'] : "<p style='color: red;'>dihapus</p>"; ?>
																			</td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
																				<?php echo isset($proyek['lokasi']['kota']) ? $proyek['lokasi']['kota'] : "<p style='color: red;'>dihapus</p>"; ?>
																			</td>
																			<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
																				<div class="flex space-x-3 rtl:space-x-reverse">
																					<button class="action-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteProyekModal" onclick="confirmDeleteProyek('<?php echo $proyek['id']; ?>');">
																						<iconify-icon icon="heroicons:trash"></iconify-icon>
																					</button>
																				</div>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																<?php else: ?>
																	<tr>
																		<td colspan="12" class="px-6 py-4 text-center text-sm text-slate-500 dark:text-slate-400">Data tidak tersedia</td>
																	</tr>
																<?php endif; ?>
															</tbody>


														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>


							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="proyekModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog relative w-auto pointer-events-none">
					<div class="modal-content border-none shadow-lg relative flex flex-col lg:w-[576px] w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
						<div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
							<div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-slate-900 dark:bg-slate-700">
								<h3 class="text-base font-medium text-white dark:text-white capitalize" id="modalTitle">
									Tambah Proyek
								</h3>
								<button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
									<svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
									</svg>
									<span class="sr-only">Close modal</span>
								</button>
							</div>
							<div class="p-6 space-y-4">
								<form id="proyekForm" class="flex flex-col space-y-3" action="<?php echo site_url('proyek/tambah'); ?>" method="POST">
									<div class="input-area">
										<label for="nama_proyek" class="form-label text-white">Nama Proyek</label>
										<input id="nama_proyek" name="nama_proyek" type="text" class="form-control" placeholder="Masukkan nama proyek">
									</div>
									<div class="input-area">
										<label for="client" class="form-label text-white">Client</label>
										<input id="client" name="client" type="text" class="form-control" placeholder="Masukkan nama client">
									</div>
									<div class="input-area">
										<label for="tgl_mulai" class="form-label text-white">Tanggal dan Waktu Mulai</label>
										<input id="tgl_mulai" name="tgl_mulai" type="datetime-local" class="form-control" required>
									</div>
									<div class="input-area">
										<label for="tgl_selesai" class="form-label text-white">Tanggal dan Waktu Selesai</label>
										<input id="tgl_selesai" name="tgl_selesai" type="datetime-local" class="form-control" required>
									</div>
									<div class="input-area">
										<label for="pimpinan_proyek" class="form-label text-white">Pimpinan Proyek</label>
										<input id="pimpinan_proyek" name="pimpinan_proyek" type="text" class="form-control" placeholder="Masukkan nama pimpinan proyek">
									</div>
									<div class="input-area">
										<label for="keterangan" class="form-label text-white">Keterangan</label>
										<textarea id="keterangan" name="keterangan" rows="4" class="form-control" placeholder="Masukkan keterangan proyek"></textarea>
									</div>
									<div class="input-area">
										<label for="lokasi" class="form-label text-white">Lokasi</label>
										<select id="lokasi" name="lokasi" class="form-control">
											<?php foreach ($lokasi_data as $loc): ?>
												<option value="<?php echo $loc['id']; ?>"> <?php
																							echo htmlspecialchars($loc['namaLokasi']) . ', ' .
																								htmlspecialchars($loc['negara']) . ', ' .
																								htmlspecialchars($loc['provinsi']) . ', ' .
																								htmlspecialchars($loc['kota']);
																							?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<p class="text-sm">Jika Lokasi anda <u style="color: red;">tidak ada disini</u>, tambahkan lokasi anda terlebih dahulu <a href="<?php echo site_url('lokasi') ?>" style="color: teal;"><u>disini</u></a></p>
									<div class=" flex items-center justify-end rounded-b dark:border-slate-600">
										<button type="button" data-bs-dismiss="modal" class="btn btn-secondary mr-2">Cancel</button>
										<button type="submit" class="btn btn-info" id="submitButton">Tambah Proyek</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="deleteProyekModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog relative w-auto pointer-events-none">
					<div class="modal-content border-none shadow-lg relative flex flex-col lg:w-[576px] w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
						<div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
							<div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-slate-900 dark:bg-slate-700">
								<h3 class="text-base font-medium text-white dark:text-white capitalize">
									Konfirmasi Hapus Proyek
								</h3>
								<button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
									<svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
									</svg>
									<span class="sr-only">Close modal</span>
								</button>
							</div>
							<div class="p-6 space-y-4">
								<form id="deleteProyekForm" action="<?php echo site_url('proyek/delete'); ?>" method="POST">
									<input type="hidden" name="id" id="proyekIdDelete">
									<p class="mb-5">Apakah Anda yakin ingin menghapus proyek ini?</p>
									<div class="flex items-center justify-end rounded-b dark:border-slate-600">
										<button type="button" data-bs-dismiss="modal" class="btn btn-secondary mr-2">Cancel</button>
										<button type="submit" class="btn btn-danger">Delete</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<footer class="md:block hidden" id="footer">
				<div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
					<div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
						<div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
							COPYRIGHT ©
							<span id="thisYear"></span>
							TestMagang PT SEI Dilindungi hak cipta
						</div>

					</div>
				</div>
			</footer>

			<div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
    backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
				<a href="<?php echo site_url('proyek') ?>">
					<div>
						<span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
							<iconify-icon icon="codicon:github-project"></iconify-icon>
						</span>
						<span class="block text-[11px] text-slate-600 dark:text-slate-300">
							Proyek
						</span>
					</div>
				</a>
				<a href="<?php echo site_url(); ?>" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
				h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
					<div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
						<img src="<?php echo base_url('assets/img/user.png') ?>" alt="" class="w-full h-full rounded-full border-2 border-slate-100">
					</div>
					<a href="<?php echo site_url('lokasi'); ?>">
						<div>
							<span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
		  text-slate-900 ">
								<iconify-icon icon="carbon:location"></iconify-icon>
							</span>
							<span class="block text-[11px] text-slate-600 dark:text-slate-300">
								Lokasi
							</span>
						</div>
					</a>
				</a>


			</div>
		</div>
	</main>
	<script src="<?php echo base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/rt-plugins.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const today = new Date().toISOString().split('T')[0];
			document.getElementById('tanggal').value = today;
		});

		function getGreeting() {
			const now = new Date();
			const hours = now.getHours();
			let greeting = "";

			if (hours >= 5 && hours < 12) {
				greeting = "Selamat Pagi,";
			} else if (hours >= 12 && hours < 15) {
				greeting = "Selamat Siang,";
			} else if (hours >= 15 && hours < 18) {
				greeting = "Selamat Sore,";
			} else {
				greeting = "Selamat Malam,";
			}

			return greeting;
		}

		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("greeting").textContent = getGreeting();

			const now = new Date();
			const jakartaOffset = 7 * 60; // Jakarta adalah UTC+7
			now.setMinutes(now.getMinutes() + jakartaOffset - now.getTimezoneOffset());

			const formatDateTime = (date) => {
				const year = date.getFullYear();
				const month = String(date.getMonth() + 1).padStart(2, '0');
				const day = String(date.getDate()).padStart(2, '0');
				const hours = String(date.getHours()).padStart(2, '0');
				const minutes = String(date.getMinutes()).padStart(2, '0');
				return `${year}-${month}-${day}T${hours}:${minutes}`;
			};

			const tglMulaiInput = document.getElementById('tgl_mulai');
			tglMulaiInput.value = formatDateTime(now);

			tglMulaiInput.addEventListener('change', (event) => {
				const tglSelesaiInput = document.getElementById('tgl_selesai');
				tglSelesaiInput.setAttribute('min', event.target.value);
			});

			const tglSelesaiInput = document.getElementById('tgl_selesai');
			tglSelesaiInput.setAttribute('min', formatDateTime(now));
		});

		function confirmDeleteProyek(id) {
			document.getElementById('proyekIdDelete').value = id;
		}
	</script>
</body>

</html>