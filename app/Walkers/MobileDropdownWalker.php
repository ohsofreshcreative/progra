<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class MobileDropdownWalker extends Walker_Nav_Menu
{
    private $current_item_url;

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Dodajemy link do strony nadrzędnej jako pierwszy element podmenu
        if ($depth === 0 && isset($this->current_item_url)) {
            $output .= "\n<ul x-show=\"open && menuOpen\" x-transition class=\"pl-4 mt-1 space-y-1\" style=\"display: none;\">\n";
            $output .= '<li><a href="' . esc_attr($this->current_item_url) . '" class="block py-1 font-semibold">Zobacz wszystko</a></li>';
            unset($this->current_item_url); // Czyścimy właściwość po użyciu
        } else {
            // Submenu jest domyślnie ukryte i pojawia się z animacją.
            $output .= "\n<ul x-show=\"open && menuOpen\" x-transition class=\"pl-4 mt-1 space-y-1\" style=\"display: none;\">\n";
        }
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes);
        $is_active = (bool) array_intersect(
            ['current-menu-item', 'current-menu-ancestor', 'current-menu-parent'],
            (array) $item->classes
        );
        $li_class = $is_active ? ' class="is-active"' : '';
        // Po zwinięciu menu etykieta jest ukryta, więc nazwa trafia do tooltipa.
        $title_attr = ':title="menuOpen ? null : ' . esc_attr(wp_json_encode($item->title)) . '"';
        $icon = get_field('menu_icon', $item->ID);
        $icon_markup = !empty($icon['ID'])
            ? wp_get_attachment_image((int) $icon['ID'], 'thumbnail', false, [
                'class' => 'w-6 h-6 object-contain shrink-0',
                'alt' => '',
            ])
            : '';
        
        // Zapisujemy URL elementu nadrzędnego, aby użyć go w start_lvl
        if ($has_children) {
            $this->current_item_url = $item->url;
        }

        // Case 1: Element ma dzieci (submenu).
        if ($has_children) {
            $output .= '<li x-data="{ open: false }"' . $li_class . '>';
            
            // Używamy klas `block py-1` dla spójności, dodając `relative` do pozycjonowania strzałki.
            // W zwiniętym menu kliknięcie przekierowuje na stronę nadrzędną.
            $output .= '<button @click="menuOpen ? open = !open : window.location.href = ' . esc_attr(wp_json_encode($item->url)) . '" :aria-expanded="open" ' . $title_attr . ' :class="menuOpen ? \'pr-8\' : \'justify-center\'" class="flex items-center gap-3 w-full py-1 text-left relative">';
            $output .= $icon_markup;
            $title_class = $depth === 0 ? '!text-white !text-xl hover:!text-primary-400' : '!text-white hover:!text-primary-400';
            $output .= '<span x-show="menuOpen" class="' . $title_class . '">' . esc_html($item->title) . '</span>';
            
            // Pozycjonujemy strzałkę absolutnie wewnątrz przycisku
            $output .= '<svg x-show="menuOpen" class="w-5 h-5 text-primary-light transition-transform duration-200 shrink-0 absolute top-1/2 right-0 -translate-y-1/2" :class="{ \'rotate-180\': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
            $output .= '</button>';
        } 
        // Case 2: Zwykły element menu, bez dzieci.
        else {
            $output .= '<li' . $li_class . '>';
            $output .= '<a href="' . esc_attr($item->url) . '" ' . $title_attr . ' :class="{ \'justify-center\': !menuOpen }" class="flex items-center gap-3 py-1"' . ($is_active ? ' aria-current="page"' : '') . '>';
            $output .= $icon_markup . '<span x-show="menuOpen">' . esc_html($item->title) . '</span>';
            $output .= '</a>';
        }
    }

    /**
     * Ends the element output, closing `<li>`.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>\n";
    }
}