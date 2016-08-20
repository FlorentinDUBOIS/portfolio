// ----------------------------------------------------------------------------
// imports
import React, { Component } from 'react';
import { render }           from 'react-dom';
import injectTapEventPlugin from 'react-tap-event-plugin';
import {
    Router,
    Route,
    IndexRoute,
    browserHistory
} from 'react-router';

import { Main }             from './components/main.jsx';
import { Home }             from './components/home.jsx';

// ----------------------------------------------------------------------------
// inject plugin
injectTapEventPlugin();

// ----------------------------------------------------------------------------
// class Routing
class Routing extends Component {
    constructor() {
        super( ...arguments );
    }

    render() {
        return(
            <Router history={ browserHistory } >
                <Route path="/" component={ Main } >
                    <IndexRoute component={ Home } />
                </Route>
            </Router>
        );
    }
}

// ----------------------------------------------------------------------------
// render all the view
render( <Routing />, window.document.querySelector( 'body' ));
