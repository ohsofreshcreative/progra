<!--- offers -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-offers relative -smt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main relative">
		@if ($gfx && !empty($gfximg['url']))
		<img
			data-gsap-element="header"
			class="__gfx pointer-events-none absolute opacity-40 top-0 -right-40 -translate-y-1/2 z-0"
			src="{{ $gfximg['url'] }}"
			alt=""
			aria-hidden="true">
		@endif

		@if (!empty($g_offers['header']) || !empty($g_offers['button']))
		<div class="__top flex flex-col md:flex-row md:items-center md:justify-between gap-6">
			@if (!empty($g_offers['header']))
			<h2 data-gsap-element="header" class="text-h3">{{ $g_offers['header'] }}</h2>
			@endif
			@if (!empty($g_offers['button']))
			<div class="inline-buttons">
				<x-button :href="$g_offers['button']['url']" variant="primary" data-gsap-element="btn">
					{{ $g_offers['button']['title'] }}
				</x-button>
			</div>
			@endif
		</div>
		@endif

		@if (!empty($offer_items))
		<div class="__tiles grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
			@foreach ($offer_items as $item)
			<div data-gsap-element="card" class="__tile flex flex-col justify-between gap-6 bg-white radius p-6">
				<div>
					@if (!empty($item['image_url']))
					<figure class="__img m-0">
						<picture>
							<img class="w-full object-contain" src="{{ $item['image_url'] }}" alt="{{ $item['image_alt'] }}">
						</picture>
					</figure>
					@endif
					<p class="text-h6 text-body!">{{ $item['title'] }}</p>
				</div>
				<div class="inline-buttons">
					<x-button :href="$item['url']" variant="primary-small">Sprawdź</x-button>
				</div>
			</div>
			@endforeach
		</div>
		@endif
	</div>

</section>
