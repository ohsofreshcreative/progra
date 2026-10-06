<?php

namespace App\Support;

class SectionBackgrounds
{
	public static function choices(array $exclude = []): array
	{
		$choices = [
			'none' => 'Brak (domyślne)',
			'section-white' => 'Białe',
			'section-light' => 'Jasne',
			'section-gradient-light' => 'Jasne (gradient)',
			'section-brand' => 'Marki',
			'section-gray' => 'Szare',
			'section-gradient' => 'Gradient',
			'section-dark' => 'Ciemne',
			'section-black' => 'Czarne',
		];

		return array_diff_key($choices, array_flip($exclude));
	}
}