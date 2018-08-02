<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Панель управления',
            'url'     => '',
            'route'   => 'voyager.dashboard',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-boat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Медиа',
            'url'     => '',
            'route'   => 'voyager.media.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Пользователи',
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Группы пользователей',
            'url'     => '',
            'route'   => 'voyager.roles.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lock',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        $toolsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Инструменты',
            'url'     => '',
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Построитель меню',
            'url'     => '',
            'route'   => 'voyager.menus.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 10,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'База данных',
            'url'     => '',
            'route'   => 'voyager.database.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 11,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Compass',
            'url'     => '',
            'route'   => 'voyager.compass.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-compass',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 12,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'BREAD',
            'url'     => '',
            'route'   => 'voyager.bread.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 13,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Настройки',
            'url'     => '',
            'route'   => 'voyager.settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }





        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Категории',
            'url'     => '',
            'route'   => 'voyager.categories.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 8,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Записи',
            'url'     => '',
            'route'   => 'voyager.posts.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-news',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Страницы',
            'url'     => '',
            'route'   => 'voyager.pages.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-file-text',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }






        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Картины',
            'url'     => '',
            'route'   => 'voyager.products.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-crop',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Стили искусства',
            'url'     => '',
            'route'   => 'voyager.styles.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-dot',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }


    }
}
