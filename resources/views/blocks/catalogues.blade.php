@php
$groups = [];

foreach ((array) ($r_catalogues ?? []) as $i => $group) {
	$items = [];

	foreach ((array) ($group['group_items'] ?? []) as $item) {
		$items[] = [
			'title' => $item['title'] ?? '',
			'file_url' => $item['file']['url'] ?? '',
		];
	}

	$groups[] = [
		'title' => $group['group_title'] ?? '',
		'slug' => sanitize_title($group['group_title'] ?? 'group') . '-' . $i,
		'items' => $items,
	];
}
@endphp

<!--- catalogues --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-catalogues relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		@if (count($groups) > 1)
		<nav class="__group-nav mb-10 flex flex-wrap gap-4" aria-label="Grupy katalogów">
			@foreach ($groups as $group)
			<a class="text-body" href="#{{ $group['slug'] }}">{{ $group['title'] }}</a>
			@endforeach
		</nav>
		@endif

		@foreach ($groups as $group)
		<div class="__group mt-12 first:mt-0" id="{{ $group['slug'] }}">
			@if (!empty($group['title']))
			<h2 data-gsap-element="header" class="text-h2">{{ $group['title'] }}</h2>
			@endif

			@if (!empty($group['items']))
			<div data-catalogue-grid class="__grid mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 xl:grid-cols-4">
				@foreach ($group['items'] as $item)
				@if (!empty($item['file_url']))
				<a href="{{ $item['file_url'] }}" download class="catalogue-item __card flex items-center gap-4 border border-dashed border-primary bg-primary-50/20 p-4 radius !text-body">
					<span aria-hidden="true" class="__icon flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-primary-50/40">
						<svg class="h-7 w-7 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 32" fill="none">
							<path d="M5 1h12l7 7v22H5V1Z" fill="currentColor" />
							<path d="M17 1v7h7" fill="white" />
							<text x="14" y="22" fill="white" font-family="Arial, sans-serif" font-size="6" font-weight="700" text-anchor="middle">PDF</text>
						</svg>
					</span>
					<span class="__content flex min-w-0 flex-col gap-2">
						<span class="__title !text-lg !font-medium !text-primary-dark">{{ $item['title'] }}</span>
						<span class="__download inline-flex items-center gap-2 text-primary-900">
							Pobierz
							<svg aria-hidden="true" class="h-4 w-4 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
								<path d="M9 2v9m0 0 3.5-3.5M9 11 5.5 7.5M3 12.5v2A1.5 1.5 0 0 0 4.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
							</svg>
						</span>
					</span>
				</a>
				@endif
				@endforeach
			</div>
			@endif
		</div>
		@endforeach
	</div>
</section>
