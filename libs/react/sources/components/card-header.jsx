import React from "react";
import Icon  from "./icon.jsx";

export default class CardIcon extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <h3 className="card-title center-align" {...this.props} >{this.props.children}</h3>;
    }
}
