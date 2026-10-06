<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;

class Advantages extends Block
{
	public $name = 'Zalety';
	public $description = 'advantages';
	public $slug = 'advantages';
	public $category = 'formatting';
	public $icon = 'list-view';
	public $keywords = ['advantages', 'akordeon'];
	public $mode = 'auto';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$advantages = new FieldsBuilder('advantages');

		$advantages
			->setLocation('block', '==', 'acf/advantages') // ważne!
			/*--- FIELDS ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('g_advantages', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addImage('image', [
				'label' => 'Zdjęcie',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])
			->addImage('icon', [
				'label' => 'Ikona nagłówka akordeonu',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])
			->addRepeater('r_advantages', [
				'label' => 'Elementy akordeonu',
				'layout' => 'table',
				'min' => 1,
				'max' => 10,
				'button_label' => 'Dodaj element'
			])
			->addText('title', ['label' => 'Nagłówek'])
			->addTextarea('text', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->endRepeater()
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('gfx', [
				'label' => 'Pokaż grafikę w tle',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addImage('gfximg', [
				'label' => 'Grafika tła',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'conditional_logic' => [[['field' => 'gfx', 'operator' => '==', 'value' => '1']]],
			])
			->addTrueFalse('nolist', [
				'label' => 'Brak punktatorów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
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

		return $advantages;
	}

	public function with(): array
	{
		$fields = [
			'g_advantages' => get_field('g_advantages'),
			'r_advantages' => get_field('g_advantages')['r_advantages'] ?? [],

			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),

			'gfx' => (bool) get_field('gfx'),
			'gfximg' => get_field('gfximg'),

			'flip' => (bool) get_field('flip'),
			'wide' => (bool) get_field('wide'),
			'nomt' => (bool) get_field('nomt'),
			'gap' => (bool) get_field('gap'),
			'nolist' => (bool) get_field('nolist'),

			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'flip' => 'order-flip',
			'wide' => 'wide',
			'nomt' => '!mt-0',
			'gap' => 'wider-gap',
			'nolist' => 'no-list',
		]);

		return $fields;
	}
}
