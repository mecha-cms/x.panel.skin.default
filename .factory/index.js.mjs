import {
    D,
    R,
    W,
    getElements,
    letClasses,
    setClass
} from '@taufik-nurrohman/document';

import {
    offEvents,
    onEvents
} from '@taufik-nurrohman/event'

import {
    toCount
} from '@taufik-nurrohman/to';

function onChange() {
    let toggles = getElements('[name="state[x][panel][skin][variant]"]:not(:disabled)');
    toCount(toggles) && toggles.forEach(toggle => {
        offEvents(['blur', 'change'], toggle, onChangeToggle);
        onEvents(['blur', 'change'], toggle, onChangeToggle);
    });
} onChange();

function onChangeToggle() {
    letClasses(R, [
        'is-dark', 'is-light',
        'is:dark', 'is:light' // Mecha < 3.3
    ]);
    setClass(R, 'is-' + this.value);
    setClass(R, 'is:' + this.value); // Mecha < 3.3
}

W._.on('change', onChange);