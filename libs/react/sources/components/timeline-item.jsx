import React from "react";

export default class TimelineItem extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <li className="event" data-date={this.props.date} >{this.props.children}</li>
        );
    }
}
