import React from "react";
import Icon  from "./icon.jsx";

export default class LinkImage extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <a href={this.props.href} target="_blank" style={{ margin: "0 10px" }} >
            <Icon icon={this.props.icon} style={{ fontSize: this.props.width }}  className="black-text" />
        </a>
    }
}
