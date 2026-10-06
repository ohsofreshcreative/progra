<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class MenuItem extends Field
{
	public function fields(): array
	{
		$menuItem = new FieldsBuilder('menu_item_fields', [
			'title' => 'Ustawienia pozycji menu',
		]);

		$menuItem
			->setLocation('nav_menu_item', '==', 'all')
			->addImage('menu_icon', [
				'label' => 'Ikona menu',
				'instructions' => 'Opcjonalna ikona wyświetlana obok nazwy w menu bocznym i mobilnym.',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			]);

		return [$menuItem];
	}
}
