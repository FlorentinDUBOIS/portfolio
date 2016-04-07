import React from "react";

export default class CollapsibleHeader extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="collapsible-header" >{ this.props.children }</div>;
    }
}
