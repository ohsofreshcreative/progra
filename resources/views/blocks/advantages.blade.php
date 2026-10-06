<!--- advantages --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-advantages relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper relative c-main">
		@if ($gfx && !empty($gfximg['url']))
		<img
			data-gsap-element="header"
			class="__gfx pointer-events-none absolute opacity-40 top-0 -right-30 -translate-y-1/10 z-0"
			src="{{ $gfximg['url'] }}"
			alt=""
			aria-hidden="true">
		@endif
		@if (!empty($g_advantages['header']))
		<h2 data-gsap-element="header" class="text-h4 text-center m-header">{{ $g_advantages['header'] }}</h2>
		@endif

		<div class="grid grid-cols-1 lg:grid-cols-2 items-start gap-8 lg:gap-16 mt-12">
			@if (!empty($r_advantages))
			<div data-gsap-element="accordion" class="__accordion flex flex-col gap-4" x-data="{ open: 0 }">
				@foreach ($r_advantages as $item)
				<div class="__item radius border border-secondary-400" :class="open === {{ $loop->index }} ? 'is-open bg-[#1F1F1F]' : 'bg-[#262626]'">
					<button type="button" class="flex items-center justify-between w-full gap-4 p-4 text-left" x-on:click="open = open === {{ $loop->index }} ? null : {{ $loop->index }}" x-bind:aria-expanded="open === {{ $loop->index }}">
						<span class="flex items-center gap-3">
							@if (!empty($g_advantages['icon']['ID']))
							<span x-show="open === {{ $loop->index }}" @if(!$loop->first) x-cloak @endif>
								{!! wp_get_attachment_image($g_advantages['icon']['ID'], 'thumbnail', false, ['class' => 'h-6 w-6 object-contain']) !!}
							</span>
							@endif
							<span class="text-h7 !text-white">{{ $item['title'] }}</span>
						</span>
					</button>
					@if (!empty($item['text']))
					<div class="px-4 pb-4" x-show="open === {{ $loop->index }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" @if(!$loop->first) x-cloak @endif>
						<p class="text-white/80!">{!! nl2br(e($item['text'])) !!}</p>
					</div>
					@endif
				</div>
				@endforeach
			</div>
			@endif

			@if (!empty($g_advantages['image']['url']))
			<figure data-gsap-element="img" class="__img m-0">
				<img class="w-full object-cover radius-img aspect-square" src="{{ $g_advantages['image']['url'] }}" alt="{{ $g_advantages['image']['alt'] ?? '' }}">
			</figure>
			@endif
		</div>
	</div>
</section>
