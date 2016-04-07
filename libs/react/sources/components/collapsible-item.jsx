import React from "react";

export default class CollapsibleItem extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <li>{ this.props.children }</li>;
    }
}
