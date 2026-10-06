@php
$mosaicPositions = [
'xl:col-start-1 xl:row-start-1',
'xl:col-start-2 xl:row-span-2 xl:row-start-1',
'xl:col-start-1 xl:row-start-2',
'xl:col-span-2 xl:col-start-3 xl:row-start-1',
'xl:col-start-3 xl:row-start-2',
'xl:col-start-4 xl:row-start-2',
];
$isMosaic = count((array) ($values ?? [])) === 6;
@endphp

<!--- values --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-values relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		@if (!empty($g_values['header']))
		<h2 data-gsap-element="header" class="text-h2 text-white m-header">{{ $g_values['header'] }}</h2>
		@endif
		@if (!empty($g_values['text']))
		<div data-gsap-element="txt" class="__txt text-white">{!! $g_values['text'] !!}</div>
		@endif

		@if (!empty($values))
		<div class="__grid mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 xl:grid-cols-4 {{ $isMosaic ? 'xl:grid-rows-[1.45fr_1fr]' : '' }}">
			@foreach ($values as $slide)
			@php
			$positionClass = $isMosaic ? ($mosaicPositions[$loop->index] ?? '') : '';
			$imageOnly = !empty($slide['image']['ID'])
			&& empty($slide['icon']['ID'])
			&& empty($slide['header'])
			&& empty($slide['opis']);
			$isStat = empty($slide['image']['ID']) && empty($slide['icon']['ID']);
			@endphp

			@if ($imageOnly)
			<figure
				data-gsap-element="stagger"
				@class([ '__image relative m-0 aspect-video overflow-hidden radius xl:aspect-auto xl:h-full' , $positionClass=> filled($positionClass) ])>
				{!! wp_get_attachment_image($slide['image']['ID'], 'large', false, ['class' => 'absolute inset-0 h-full w-full object-cover']) !!}
			</figure>
			@else
			<div
				data-gsap-element="stagger"
				@class([ '__card relative flex h-full flex-col justify-center gap-4 overflow-hidden border border-dashed border-primary bg-gradient radius p-6' , $positionClass=> filled($positionClass) ])>
				<div class="__content flex flex-col gap-2">
					@if (!empty($slide['icon']['ID']))
					<figure class="__icon m-0 h-max w-max">
						{!! wp_get_attachment_image($slide['icon']['ID'], 'full') !!}
					</figure>
					@elseif (!empty($slide['image']['ID']))
					<figure class="__image m-0 [&_img]:h-max [&_img]:w-max max-h-40 overflow-hidden radius">
						{!! wp_get_attachment_image($slide['image']['ID'], 'medium') !!}
					</figure>
					@endif

					@if (!empty($slide['header']))
					<p @class([ '__header' , 'text-h4 !text-primary'=> $isStat,
						'text-h6 text-white' => !$isStat,
						])>{{ $slide['header'] }}</p>
					@endif
					@if (!empty($slide['opis']))
					<p class="__txt text-white">{{ $slide['opis'] }}</p>
					@endif
				</div>
			</div>
			@endif
			@endforeach
		</div>
		@endif
	</div>
</section>