<!--- logos preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Logotypy partnerów</div>
			<span class="acf-preview__slug">acf/logos</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
    @foreach (['gallery' => 'Pierwszy rząd', 'gallery_second' => 'Drugi rząd'] as $galleryField => $label)
      @if (!empty($g_logos[$galleryField]))
        <p>{{ $label }}</p>
        <div class="acf-preview__logo-list flex flex-wrap items-center">
          @foreach (array_slice((array) $g_logos[$galleryField], 0, 8) as $image)
            @if (!empty($image['ID']))
              {!! wp_get_attachment_image($image['ID'], 'thumbnail', false, ['class' => 'h-16 w-auto object-contain']) !!}
            @endif
          @endforeach
        </div>
      @endif
    @endforeach
		@if (!empty($g_logos['header']))
		<p class="text-h5">{{ $g_logos['header'] }}</p>
		@endif
		@if (empty($g_logos['gallery']) && empty($g_logos['gallery_second']))
		<p>Logotypy są zarządzane w panelu „Logotypy partnerów”.</p>
		@endif
	</div>
</div>
