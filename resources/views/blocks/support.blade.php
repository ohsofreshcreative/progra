<!--- support --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-support relative overflow-hidden -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main relative z-10">
		@if ($gfx && !empty($gfximg['url']))
		<img
			data-gsap-element="header"
			class="__gfx pointer-events-none absolute opacity-40 top-0 -left-40 -translate-y-1/3 z-0"
			src="{{ $gfximg['url'] }}"
			alt=""
			aria-hidden="true">
		@endif

		@if (!empty($g_support['label']))
		<p data-gsap-element="header" class="text-h7 m-title">{{ $g_support['label'] }}</p>
		@endif
		@if (!empty($g_support['header']))
		<h2 data-gsap-element="header" class="text-h3 m-header">{{ $g_support['header'] }}</h2>
		@endif
		@if (!empty($g_support['text']))
		<div data-gsap-element="txt" class="__txt">{!! $g_support['text'] !!}</div>
		@endif

		@if (!empty($r_support))
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
			@foreach ($r_support as $item)
			<div data-gsap-element="card" class="__card relative radius bg-black overflow-hidden p-8">
				@if (!empty($item['icon']['url']))
				<img class="__icon absolute max-h-50 max-w-50 h-full w-full object-contain opacity-10 -right-10 -bottom-10" src="{{ $item['icon']['url'] }}" alt="">
				@endif
				@if (!empty($item['icon']['url']))
				<img class="__icon h-16 w-auto m-img" src="{{ $item['icon']['url'] }}" alt="">
				@endif
				@if (!empty($item['title']))
				<p class="text-h6 m-header">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p class="__txt">{!! nl2br(e($item['text'])) !!}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
	</div>
</section>