<?php

Breadcrumbs::register('backend.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(trans('labels.backend.dashboard.title'), route('backend.dashboard'));
});