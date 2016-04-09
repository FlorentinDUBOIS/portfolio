import React from "react";

export default class OpenModal extends React.Component {
    constructor( props ) {
        super( props );
    }

    handleClick() {
        $( "#legal-mention" ).openModal();
    }

    render() {
        return <a onClick={this.handleClick} {...this.props} >{this.props.children}</a>
    }
}
