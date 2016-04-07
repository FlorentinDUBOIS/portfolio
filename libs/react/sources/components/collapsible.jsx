import React from "react";

export default class Collapsible extends React.Component {
    constructor( props ) {
        super( props );

        this.state = {
            identity: `${ parseInt( Math.random() * 1000 * Math.random()) }-${ parseInt( Math.random() * 1000 * Math.random()) }-${ parseInt( Math.random() * 1000 * Math.random()) }-${ parseInt( Math.random() * 1000 * Math.random()) }`
        };
    }

    componentDidMount() {
        $( `#${ this.state.identity }` ).collapsible({
            accordion: false
        });
    }

    render() {
        return <ul id={ this.state.identity } className="collapsible popout" dataCollapsible="accordion" >{ this.props.children }</ul>;
    }
}
