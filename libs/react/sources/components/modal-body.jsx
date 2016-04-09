import React from "react";

export default class ModalBody extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={`modal-content ${this.props.className || ""}`} {...this.props} >
                {this.props.children}
            </div>
        );
    }
}
