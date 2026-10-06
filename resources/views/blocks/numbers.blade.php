<!--- numbers -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-numbers relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main grid grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-16">
		<div class="__content">
			@if (!empty($header))
			<h2 data-gsap-element="header" class="text-h1 m-header">{{ $header }}</h2>
			@endif
			@if (!empty($text))
			<div data-gsap-element="txt" class="__txt">{!! $text !!}</div>
			@endif
			@if (!empty($button))
			<div class="inline-buttons m-btn">
				<x-button :href="$button['url']" variant="primary" data-gsap-element="btn">
					{{ $button['title'] }}
				</x-button>
			</div>
			@endif
		</div>

		<div class="__cards grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
			@foreach ($r_numbers ?? [] as $item)
			<div data-gsap-element="card" class="__card radius  bg-gradientflex aspect-video flex-col justify-center border-1 border-dotted border-primary p-6 lg:p-8">
				@if (!empty($item['title']))
				<p class="text-h4 text-primary!">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['txt']))
				<p class="text-h6">{!! nl2br(e($item['txt'])) !!}</p>
				@endif
			</div>
			@endforeach
			@if (!empty($image['url']))
			<figure data-gsap-element="img" class="__img m-0 aspect-video overflow-hidden radius-img">
				<img class="h-full w-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}">
			</figure>
			@endif
		</div>
	</div>

</section>
