<footer class="footer bg-gradient-dark overflow-hidden relative z-10">

	<div class="__wrapper relative z-10">
		<img src="{{ get_template_directory_uri() }}/resources/images/logo-stroke.svg" alt="Footer Background" class="absolute -bottom-18 object-cover" />
		<div class="c-main">
			@php
			$footerSidebars = [];

			for ($i = 1; $i <= 4; $i++) {
				$sidebarId='sidebar-footer-' . $i;

				if (is_active_sidebar($sidebarId)) {
				$footerSidebars[]=$sidebarId;
				}
				}

				$footerGridClass=[
				1=> 'lg:grid-cols-1',
				2 => 'lg:grid-cols-2',
				3 => 'lg:grid-cols-3',
				4 => 'lg:grid-cols-4',
				5 => 'lg:grid-cols-5',
				][count($footerSidebars) + 1];
				@endphp

				<div class="__widgets grid grid-cols-1 md:grid-cols-2 {{ $footerGridClass }} gap-1 md:gap-6 footer-py">
					@foreach ($footerSidebars as $sidebarId)
					<div>@php(dynamic_sidebar($sidebarId))</div>
					@endforeach

					<div class="flex flex-col gap-4 mb-10 md:mb-0">
						@if(!empty($footer_contact['address']))
						<p class="text-h6">Kontakt</p>
						<div class="mt-2 grid grid-cols-[32px_minmax(0,1fr)] items-start gap-x-4">
							<img
								class="relative top-1 h-8 w-8"
								src="{{ get_template_directory_uri() }}/resources/images/place.svg"
								alt=""
								aria-hidden="true" />
							<div class="__txt">{!! $footer_contact['address'] !!}</div>
						</div>
						@endif
						<div class="flex flex-col gap-2">
							@if(!empty($footer_contact['phone']))
							<a href="tel:{{ str_replace(' ', '', $footer_contact['phone']) }}" class="font-medium inline-flex items-center gap-4 hover:!underline">
								<img
									class="h-8 w-8 shrink-0"
									src="{{ get_template_directory_uri() }}/resources/images/phone.svg"
									alt=""
									aria-hidden="true" />
								{{ $footer_contact['phone'] }}
							</a>
							@endif
							@if(!empty($footer_contact['email']))
							<a href="mailto:{{ $footer_contact['email'] }}" class="font-medium inline-flex items-center gap-4 hover:!underline">
								<img
									class="h-8 w-8 shrink-0"
									src="{{ get_template_directory_uri() }}/resources/images/mail.svg"
									alt=""
									aria-hidden="true" />
								{{ $footer_contact['email'] }}
							</a>
							@endif
						</div>
					</div>
				</div>
		</div>
	</div>

	<div class="footer-bottom relative z-102 border-t border-primary bg-gradient-dark py-10">
		<div class="c-main text-white flex flex-col md:flex-row justify-between gap-6">
			<p class="">Copyright ©{{ date('Y') }} {{ get_bloginfo('name') }}. All Rights Reserved</p>
			<p class="flex gap-2">Designed &amp; Developed by
				<a target="_blank" rel="nofollow" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="{{ get_template_directory_uri() }}/resources/images/ohsofresh.svg"></a>
			</p>
		</div>
	</div>

</footer>