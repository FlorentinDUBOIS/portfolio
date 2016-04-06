import React from "react";

export default class Icon extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <i className={ "material-icons " + this.props.className } style={ this.props.style } >{ this.props.icon }</i>
    }
}
