<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;

class Slider extends Block
{
	public $name = 'Slider';
	public $description = 'slider';
	public $slug = 'slider';
	public $category = 'formatting';
	public $icon = 'image-flip-horizontal';
	public $keywords = ['slider', 'tresc', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$slider = new FieldsBuilder('slider');

		$slider
			->setLocation('block', '==', 'acf/slider')
			->addTab('Treści', ['placement' => 'top'])
			->addText('slider_title', ['label' => 'Nagłówek sekcji'])
			->addRepeater('r_slider', [
				'label' => 'Slajdy',
				'layout' => 'table',
				'min' => 1,
				'button_label' => 'Dodaj slajd',
			])
			->addImage('image', [
				'label' => 'Zdjęcie',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->endRepeater()

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', ['label' => 'ID'])
			->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => SectionBackgrounds::choices(),
				'default_value' => 'none',
				'ui' => 0,
				'allow_null' => 0,
			]);

		return $slider;
	}

	public function with(): array
	{
		$fields = [
			'slides' => get_field('r_slider') ?: [],
			'slider_title' => get_field('slider_title'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'nomt' => (bool) get_field('nomt'),
			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'nomt' => '!mt-0',
		]);

		return $fields;
	}
}
