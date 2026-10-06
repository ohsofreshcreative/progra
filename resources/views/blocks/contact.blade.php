<!--- contact --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-contact section-gradient relative' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_contact_1['image']))
	<figure class="absolute inset-0 w-full h-full z-0 m-0">
		<picture class="w-full h-full">
			<img src="{{ $g_contact_1['image']['url'] }}" alt="{{ $g_contact_1['image']['alt'] }}" class="w-full h-full object-cover" />
		</picture>
	</figure>
	@endif

	@if (!empty($g_contact_1['image']))
	<div class="absolute inset-0 z-1 pointer-events-none"></div>
	@endif

	<div class="__wrapper c-main relative z-2 pt-10 pb-10 md:pt-20 md:pb-0">

		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content flex flex-col justify-between !text-white">
				<h2 data-gsap-element="header" class="text-white m-header">{!! $g_contact_1['header'] !!}</h2>
				<div data-gsap-element="text">{!! $g_contact_1['text'] !!}</div>
				<div class="__wrapper grid grid-cols-1 md:grid-cols-2 gap-10 mt-4">
					<div class="__data">
						<a data-gsap-element="txt" class="__phone flex items-center hover:!text-primary-200 w-max" href="tel:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['phone'] }}</a>
						<a data-gsap-element="txt" class="__mail flex items-center hover:!text-primary-200 w-max mt-2" href="mailto:{{ $g_contact_1['mail'] }}">{{ $g_contact_1['mail'] }}</a>
						<p data-gsap-element="txt" class="__address mt-2">{!! $g_contact_1['address'] !!}</p>
					</div>
					<div data-gsap-element="txt" class="__hours mt-2">{!! $g_contact_1['hours'] !!}</div>
				</div>
				<x-button
					href="#dojazd"
					variant="secondary"
					class="mt-6"
					data-gsap-element="btn">
					Sprawdź lokalizacje
				</x-button>
			</div>

			<div data-gsap-element="form" class="bg-white radius p-10">
				<h4 class="!text-body mb-4">{!! $g_contact_2['title'] !!}</h4>
				{!! do_shortcode($g_contact_2['shortcode']) !!}
			</div>
		</div>
	</div>

</section>