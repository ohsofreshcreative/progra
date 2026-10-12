@php
use App\Walkers\MobileDropdownWalker;
@endphp

<header
	x-data="{
		mobileOpen: false,
		desktopOpen: (() => { try { return localStorage.getItem('menuCollapsed') !== '1' } catch (e) { return true } })(),
		isDesktop: window.matchMedia('(min-width: 769px)').matches,
		get menuOpen() { return this.isDesktop ? this.desktopOpen : this.mobileOpen },
		toggleMenu() {
			if (this.isDesktop) {
				this.desktopOpen = !this.desktopOpen;
				try { localStorage.setItem('menuCollapsed', this.desktopOpen ? '0' : '1') } catch (e) {}
				document.documentElement.classList.toggle('menu-collapsed', !this.desktopOpen);
			} else this.mobileOpen = !this.mobileOpen;
		},
		init() {
			this.viewport = window.matchMedia('(min-width: 769px)');
			this.onViewportChange = (event) => { this.isDesktop = event.matches };
			this.viewport.addEventListener('change', this.onViewportChange);
		},
		destroy() { this.viewport.removeEventListener('change', this.onViewportChange) }
	}"
	class="relative top-0 z-50 bg-black masthead fixed-top">

	<div class="mobile-header flex items-center justify-between p-4">
		<a class="brand shrink-0" href="{{ home_url('/') }}">
			@if ($logo)
			<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="w-auto h-10">
			@else
			<span>{{ $siteName }}</span>
			@endif
		</a>
		<button @click="mobileOpen = !mobileOpen" class="p-2 text-white"
			:aria-expanded="mobileOpen" aria-expanded="false" aria-controls="mobile-menu-panel"
			aria-label="Otwórz menu główne">
			<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
		</button>
	</div>

	<!-- Collapsible desktop sidebar / mobile menu -->
	<div @keydown.escape="if (!isDesktop) mobileOpen = false" class="mobile-menu bg-black border-r border-dashed border-primary-800" :class="{ 'is-collapsed': !menuOpen }">
		<div class="flex items-center justify-between px-6 pt-8 pb-6" :class="{ '!px-2': !menuOpen }">
			<a x-show="menuOpen" class="brand shrink-0" href="{{ home_url('/') }}">
				@if ($logo)
				<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="w-auto h-8">
				@else
				<span>{{ $siteName }}</span>
				@endif
			</a>
			<button
				@click="toggleMenu()"
				class="p-2 text-primary border border-primary radius shrink-0 hover:bg-primary hover:text-white"
				:aria-expanded="menuOpen"
				:aria-label="menuOpen ? (isDesktop ? 'Zwiń menu główne' : 'Zamknij menu główne') : 'Rozwiń menu główne'"
				aria-expanded="true"
				aria-label="Zwiń menu główne"
				aria-controls="mobile-menu-panel">
				<svg class="w-6 h-6" :class="{ 'rotate-180': !menuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="m12 6-6 6 6 6M6 12h12" />
				</svg>
			</button>
		</div>

		<div id="mobile-menu-panel" class="px-3 pb-6 overflow-y-auto" :class="{ '!px-1': !menuOpen }">
			@if (has_nav_menu('primary_navigation'))
			<nav aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
				{!! wp_nav_menu([
					'theme_location' => 'primary_navigation',
					'menu_class' => 'nav-mobile flex flex-col',
					'container' => false,
					'echo' => false,
					'walker' => new MobileDropdownWalker(),
				]) !!}
			</nav>
			@endif

			<div x-show="menuOpen" class="mt-8 px-3">
				<a href="tel:413114466" class="block w-full btn btn-primary">41 311 44 66</a>
			</div>
		</div>
	</div>
</header>
