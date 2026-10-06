<!-- hero --->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-hero relative bg-gradient -spt overflow-visible' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    @if (!empty($g_hero['video']) || !empty($g_hero['image']))
    <div class="__media absolute top-0 right-0 bottom-0 z-0 hidden md:block w-1/2 overflow-hidden" style="border-radius: 180px 0 0 180px / 50% 0 0 50%;">
        @if (!empty($g_hero['video']))
        <video class="w-full h-full object-cover" autoplay loop muted playsinline>
            <source src="{{ $g_hero['video'] }}" type="video/mp4">
        </video>
        @else
        <img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] }}" class="w-full h-full object-cover" />
        @endif
    </div>
    @endif

    <div class=" __wrapper c-main relative z-10">
        <div class="__content relative flex flex-col justify-center w-full md:w-10/12 lg:w-8/12 z-20 pt-48 pb-62">
            @if (!empty($g_hero['label']))
            <p data-gsap-element="txt" class="__label text-white m-title">{{ $g_hero['label'] }}</p>
            @endif
            <h1 data-gsap-element="header" class="text-h3 text-white">
                {{ $g_hero['title'] }}
            </h1>
			@if (!empty($g_hero['text']))
            <div data-gsap-element="text" class="text-white mt-2">
                {!! $g_hero['text'] !!}
            </div>
			@endif

            <div class="inline-buttons m-btn">
                @if (!empty($g_hero['button1']))
                <x-button
                    :href="$g_hero['button1']['url']"
                    variant="primary"
                    class=""
                    data-gsap-element="btn">
                    {{ $g_hero['button1']['title'] }}
                </x-button>
                @endif

                @if (!empty($g_hero['button2']))
                <x-button
                    :href="$g_hero['button2']['url']"
                    variant="white"
                    class=""
                    data-gsap-element="btn">
                    {{ $g_hero['button2']['title'] }}
                </x-button>
                @endif
            </div>
        </div>
    </div>

</section>