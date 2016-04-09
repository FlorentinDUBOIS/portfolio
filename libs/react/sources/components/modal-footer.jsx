import React from "react";

export default class ModalFooter extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={`modal-footer ${this.props.className || ""}`} {...this.props} >
                {this.props.children}
            </div>
        );
    }
}
