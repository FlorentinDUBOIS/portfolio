import React from "react";

export default class Github extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <a target="_blank" href={"https://github.com/FlorentinDUBOIS/" + this.props.depot} {...this.props} >
                {this.props.children}
            </a>
        );
    }
}
