import React from "react";

export default class TimelineHeader extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <h4>{this.props.children}</h4>
        );
    }
}
