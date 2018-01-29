<?php

namespace Bowling\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class Breadcrumb extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
      'items' => []
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view("admin.widgets.breadcrumb", [
            'config' => $this->config,
        ]);
    }
}
