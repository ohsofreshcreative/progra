<!--- slider --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-slider relative -smt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		@if (!empty($slider_title))
		<h2 data-gsap-element="header" class="text-h3">{{ $slider_title }}</h2>
		@endif

		@if (!empty($slides))
		<div class="swiper slider-standard relative mt-12 !overflow-visible">
			<div class="swiper-wrapper">
				@foreach ($slides as $slide)
				<div class="swiper-slide flex flex-col bg-white radius p-6">
					@if (!empty($slide['image']['ID']))
					<figure class="__img m-img flex h-36 items-center justify-center">
						{!! wp_get_attachment_image($slide['image']['ID'], 'medium', false, ['class' => 'h-full w-full object-contain']) !!}
					</figure>
					@endif
					@if (!empty($slide['header']))
					<p class="__header text-h6 m-header !text-body">{{ $slide['header'] }}</p>
					@endif
					@if (!empty($slide['text']))
					<div class="__txt !text-body">{!! $slide['text'] !!}</div>
					@endif
				</div>
				@endforeach
			</div>

			<div data-gsap-element="arrows" class="flex items-center gap-4 mt-8">
				<button type="button" aria-label="Poprzednie slajdy" class="__prev flex h-14 w-14 shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-primary p-0">
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
						<path d="M0.270429 5.31498C0.270706 5.31469 0.270937 5.31435 0.27126 5.31406L5.08882 0.281803C5.44973 -0.0951806 6.03348 -0.0937777 6.39273 0.285093C6.75194 0.663916 6.75055 1.27664 6.38964 1.65367L3.15514 5.03226L12.078 5.03226C12.5872 5.03226 13 5.46552 13 6C13 6.53448 12.5872 6.96774 12.078 6.96774L3.15518 6.96774L6.3896 10.3463C6.75051 10.7234 6.75189 11.3361 6.39269 11.7149C6.03344 12.0938 5.44963 12.0938 5.08877 11.7182L0.271213 6.68594C0.270936 6.68565 0.270706 6.68531 0.270383 6.68502C-0.0907122 6.30673 -0.08956 5.69202 0.270429 5.31498Z" fill="white" />
					</svg>
				</button>
				<button type="button" aria-label="Następne slajdy" class="__next flex h-14 w-14 shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-primary p-0">
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
						<path d="M12.7296 5.31498C12.7293 5.31469 12.7291 5.31435 12.7287 5.31406L7.91118 0.281803C7.55027 -0.0951806 6.96652 -0.0937777 6.60727 0.285093C6.24806 0.663916 6.24945 1.27664 6.61036 1.65367L9.84486 5.03226L0.921985 5.03226C0.412773 5.03226 0 5.46552 0 6C0 6.53448 0.412773 6.96774 0.921985 6.96774L9.84482 6.96774L6.6104 10.3463C6.24949 10.7234 6.24811 11.3361 6.60731 11.7149C6.96657 12.0938 7.55037 12.0938 7.91123 11.7182L12.7288 6.68594C12.7291 6.68565 12.7293 6.68531 12.7296 6.68502C13.0907 6.30673 13.0896 5.69202 12.7296 5.31498Z" fill="white" />
					</svg>
				</button>
			</div>
		</div>
		@endif
	</div>
</section>
