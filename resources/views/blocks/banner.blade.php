<!-- banner -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-banner relative -spt overflow-hidden bg-background-dark' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_banner['image']['ID']))
	<figure class="__image absolute inset-0 z-0 m-0">
		{!! wp_get_attachment_image($g_banner['image']['ID'], 'full', false, ['class' => 'w-full h-full object-cover', 'alt' => $g_banner['image']['alt'] ?? '']) !!}
	</figure>
	@endif

	<div class="__overlay absolute inset-0 z-1 bg-linear-to-b from-[rgba(0,0,0,0.80)] to-[rgba(29,16,7,1)] pointer-events-none"></div>

	<div class="__wrapper c-main relative z-10 -spt">
		<div class="__content flex w-full flex-col pb-24 lg:w-2/3">
			@if (function_exists('yoast_breadcrumb'))
			<div data-gsap-element="bread" class="__breadcrumb mb-10">
				{!! yoast_breadcrumb('<p id="breadcrumbs">', '</p>', false) !!}
			</div>
			@endif

			@if (!empty($g_banner['title']))
			<h1 data-gsap-element="header" class="text-h2 !text-white m-header">
				{{ $g_banner['title'] }}
			</h1>
			@endif
			@if (!empty($g_banner['text']))
			<div data-gsap-element="text" class="__text !text-white text-lg">
				{!! $g_banner['text'] !!}
			</div>
			@endif

			@if (!empty($g_banner['button1']) || !empty($g_banner['button2']))
			<div class="inline-buttons m-btn">
				@if (!empty($g_banner['button1']))
				<x-button
					:href="$g_banner['button1']['url']"
					variant="primary"
					class=""
					data-gsap-element="btn">
					{{ $g_banner['button1']['title'] }}
				</x-button>
				@endif

				@if (!empty($g_banner['button2']))
				<x-button
					:href="$g_banner['button2']['url']"
					variant="white"
					class=""
					data-gsap-element="btn">
					{{ $g_banner['button2']['title'] }}
				</x-button>
				@endif
			</div>
			@endif
		</div>
	</div>

</section>