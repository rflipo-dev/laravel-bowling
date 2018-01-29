<?php

namespace Bowling\Widgets\Admin;

use Arrilot\Widgets\AbstractWidget;

class Pagination extends AbstractWidget
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
    public function run($collection)
    {
        return view("admin.widgets.pagination", [
            'config' => $this->config,
            'collection' => $collection
        ]);
    }
}
