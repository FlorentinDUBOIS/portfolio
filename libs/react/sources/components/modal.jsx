import React from "react";

export default class Modal extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={`modal ${this.props.className || ""}`} {...this.props} >
                {this.props.children}
            </div>
        );
    }
}
