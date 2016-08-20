// ----------------------------------------------------------------------------
// imports
import React, { Component } from 'react';

// ----------------------------------------------------------------------------
// main
export class Main extends Component {
    constructor() {
        super( ...arguments );
    }

    render() {
        return(
            <div>{ this.props.children }</div>
        );
    }
}
