<?php

namespace TeachMe\Http\ViewComposers;


use Illuminate\Support\Facades\Route;

class TicketsListComposer
{
    public function compose($view)
    {
        $view->title = trans(Route::currentRouteName() . '_title');
        $view->text_total = trans_choice(
            'tickets.total',
            $view->tickets->total(),
            ['title' => strtolower($view->title)]
        );
    }
}