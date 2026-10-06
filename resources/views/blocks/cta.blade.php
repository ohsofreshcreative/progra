<!--- cta -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta relative -smt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_octa['background_grid']['ID']))
	<figure class="__grid absolute inset-0 z-0 m-0 pointer-events-none">
		{!! wp_get_attachment_image($g_octa['background_grid']['ID'], 'full', false, ['class' => 'w-full h-full object-cover opacity-50', 'alt' => '']) !!}
	</figure>
	@endif

	<div class="__wrapper c-main relative z-10">

		<div class="__inside grid grid-cols-1 md:grid-cols-2 items-center gap-12">
			@if (!empty($g_octa['image']['url']))
			<figure data-gsap-element="img" class="__img img-2xl radius-img overflow-hidden m-0">
				<img src="{{ $g_octa['image']['url'] }}" alt="{{ $g_octa['image']['alt'] ?? '' }}" class="w-full h-full object-cover">
			</figure>
			@endif

			<div class="__content w-full">
				@if (!empty($g_octa['header']))
				<p data-gsap-element="header" class="block text-h4 !text-white !m-header">{{ $g_octa['header'] }}</p>
				@endif
				@if (!empty($g_octa['txt']))
				<div data-gsap-element="txt" class="text-white">{!! $g_octa['txt'] !!}</div>
				@endif

				@if ($form && !empty($g_octa['shortcode']))
				<div data-gsap-element="form" class="m-btn">
					{!! do_shortcode($g_octa['shortcode']) !!}
				</div>
				@endif

			</div>
		</div>

	</div>

</section>
