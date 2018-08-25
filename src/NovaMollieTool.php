<?php

namespace Taronyuu\NovaMollieTool;

use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaMollieTool extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-mollie-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-mollie-tool', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-mollie-tool::navigation');
    }
}
