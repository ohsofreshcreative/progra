<!--- proces --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-proces relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top">
			@if (!empty($g_proces['header']))
			<h2 data-gsap-element="header" class="text-h2 m-header">{{ $g_proces['header'] }}</h2>
			@endif
			@if (!empty($g_proces['txt']))
			<div data-gsap-element="txt" class="__txt">{!! $g_proces['txt'] !!}</div>
			@endif
		</div>

		@if (!empty($r_proces))
		@php
		$repeater_count = count($r_proces);
		$grid_class = 'lg:grid-cols-4';
		if ($repeater_count === 3) {
		$grid_class = 'lg:grid-cols-3';
		}
		@endphp
		<div class="__repeater grid grid-cols-1 gap-8 md:grid-cols-2 {{ $grid_class }} mt-12">

			@foreach ($r_proces as $item)
			<div data-gsap-element="stagger" class="relative h-full bg-background radius p-6 pt-28">
				@if (!empty($item['image']['ID']))
				<div class="pointer-events-none absolute bottom-4 right-4 z-0 opacity-20">
					{!! wp_get_attachment_image($item['image']['ID'], 'medium', false, ['class' => 'h-40 w-40 object-contain', 'alt' => '']) !!}
				</div>
				@endif
				<span
					aria-hidden="true"
					@class([
						'absolute left-0 top-0 z-10 h-14 w-14 rounded-br-xl',
						'bg-gradient-light' => $background === 'section-gradient-light',
						'bg-secondary-dark' => $background !== 'section-gradient-light',
					])></span>
				<div class="absolute left-0 top-0 z-20 h-12 w-12">
					<span class="absolute inset-0 flex items-center justify-center rounded-lg bg-primary text-h5 text-white">
						{{ !empty($item['number']) ? $item['number'] : $loop->iteration }}
					</span>
				</div>
				<div class="relative  z-10">
					@if (!empty($item['title']))
					<p class="text-h6 text-white!">{{ $item['title'] }}</p>
					@endif
					@if (!empty($item['txt']))
					<div class="__txt [&_p]:text-white! mt-2">{!! $item['txt'] !!}</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		@endif
	</div>

</section>