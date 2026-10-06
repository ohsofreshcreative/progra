<!--- steps --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-steps relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
			<div>
				@if (!empty($g_steps['label']))
				<p data-gsap-element="header" class="__title">{{ $g_steps['label'] }}</p>
				@endif
				@if (!empty($g_steps['header']))
				<h2 data-gsap-element="header" class="text-h3">{{ $g_steps['header'] }}</h2>
				@endif
			</div>
			@if (!empty($g_steps['button']))
			<div class="inline-buttons mb-3">
				<x-button :href="$g_steps['button']['url']" variant="outline-primary" data-gsap-element="btn">
					{{ $g_steps['button']['title'] }}
				</x-button>
			</div>
			@endif
		</div>

		@if (!empty($r_steps))
		<div class="grid grid-cols-1 items-stretch gap-6 mt-12 sm:grid-cols-2 lg:grid-cols-6">
			@foreach ($r_steps as $item)
			<div data-gsap-element="card" @class(['__card flex flex-col', 'lg:relative lg:top-16' => $loop->even])>
				<p class="text-big font-header text-primary-900">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
				<div class="__inside radius flex flex-1 flex-col bg-primary p-6 text-white -mt-10">
					<div class="flex items-center gap-1 m-title" aria-hidden="true">
						@foreach (range(1, 6) as $flame)
						<svg class="h-4 w-4 shrink-0 {{ $flame <= $loop->parent->iteration ? 'text-white' : 'text-white/40' }}" viewBox="0 0 20 24" fill="currentColor">
							<path d="M10 1C8.1 5.3 3 9.2 3 15a7 7 0 0 0 14 0c0-5.8-5.1-9.7-7-14Z" />
						</svg>
						@endforeach
					</div>
					@if (!empty($item['title']))
					<p class="text-h7 m-header text-white! font-semibold">{{ $item['title'] }}</p>
					@endif
					@if (!empty($item['text']))
					<p class="text-white!">{!! nl2br(e($item['text'])) !!}</p>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		@endif
	</div>
</section>
