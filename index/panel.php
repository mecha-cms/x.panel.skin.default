<?php

// Disable this extension if `panel.skin` extension is disabled or removed ;)
if (!isset($state->x->{'panel.skin'})) {
    return $_;
}

$name = $state->x->panel->skin->name ?? "";
$variant = $state->x->panel->skin->variant ?? 'dark';

// Load asset and enable variant option if current `skin.name` value is `default`
if ('default' === $name) {
    $_['asset']['panel.skin.' . $name] = [
        'id' => false,
        'path' => stream_resolve_include_path(__DIR__ . D . '..' . D . 'index' . (defined('TEST') && TEST ? '.' : '.min.') . 'css'),
        'stack' => 30
    ];
    $_['is'][$variant] = true;
}

// Add `default` skin to skin name selector
if ('.state' === $_['path'] && 'get' === $_['task']) {
    $_['asset'][stream_resolve_include_path(__DIR__ . D . '..' . D . 'index' . (defined('TEST') && TEST ? '.' : '.min.') . 'js')] = [
        'id' => false,
        'stack' => 50
    ];
    $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['panel']['lot']['fields']['lot']['skin']['lot']['default'] = 'Default';
    if ('default' === $name) {
        $_['lot']['desk']['lot']['form']['lot'][1]['lot']['tabs']['lot']['panel']['lot']['fields']['lot']['variant'] = [
            'name' => 'state[x][panel][skin][variant]',
            'type' => 'item',
            'value' => $variant,
            'lot' => [
                'dark' => 'Dark',
                'light' => 'Light'
            ],
            'stack' => 40.1
        ];
    }
}

return $_;