'use strict';

import Lang from 'lang.js';
import localization from './localization';

const lang = new Lang({
  messages: localization
});

export default window.lang = lang;
