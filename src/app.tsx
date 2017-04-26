import * as React from 'react'
import * as injectTapEventPlugin from 'react-tap-event-plugin';
import { render } from 'react-dom'

import { Root } from './components/root'

// Needed for onTouchTap
// http://stackoverflow.com/a/34015469/988941
injectTapEventPlugin();

render(<Root />, document.getElementById('react-root'))
