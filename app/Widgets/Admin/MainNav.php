<?php

namespace Bowling\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class MainNav extends AbstractWidget
{
  /**
  * The configuration array.
  *
  * @var array
  */
  protected $config = [];

  /**
  * Treat this method as a controller action.
  * Return view() or other content to display.
  */
  public function run()
  {
    $nav = [
      'bowling' => [
        'group_name' => 'Bowling',
        'children' => [
          'users' => [
            'name' => 'Players',
            'icon' => 'fa-users',
            'href' => route('admin::users.index')
          ],
          'games' => [
            'name' => 'Games',
            'icon' => 'fa-gamepad',
            'href' => route('admin::games.index')
          ],
          'frames' => [
            'name' => 'Frames',
            'icon' => 'fa-bullseye',
            'href' => route('admin::frames.index')
          ],
          'launches' => [
            'name' => 'Launches',
            'icon' => 'fa-rocket',
            'href' => route('admin::launches.index')
          ],
        ]
      ]
    ];

    return view("admin.widgets.main_nav", [
      'config' => $this->config,
      'nav' => $nav
    ]);
  }
}
