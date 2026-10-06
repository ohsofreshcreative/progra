<!--- map -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-map relative -spt -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main relative">
		<div class="__wrapper grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			<div data-gsap-element="txt" class="__txt radius-img overflow-hidden mt-8 order1">
				{!! $g_map['map'] !!}
			</div>

			<div class="__content order2">
				@if (!empty($g_map['header']))
				<h3 data-gsap-element="header" class="text-primary m-header">{{ $g_map['header'] }}</h3>
				@endif
				<div data-gsap-element="txt" class="__txt">
					{!! $g_map['text'] !!}
				</div>
				
				@if (!empty($g_map['button']))
				<x-button
					:href="$g_map['button']['url']"
					variant="primary"
					class="mt-6"
					data-gsap-element="btn">
					{{ $g_map['button']['title'] }}
				</x-button>
				@endif
			</div>
		</div>
	</div>

</section>