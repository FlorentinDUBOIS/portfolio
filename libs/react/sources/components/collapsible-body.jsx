import React from "react";

export default class CollapsibleBody extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className="collapsible-body" style={{ padding: "0 1rem" }} >
                { this.props.children }
            </div>
        );
    }
}
