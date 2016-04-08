import React from "react";

export default class Timeline extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <ul className="timeline z-depth-1" >
                {this.props.children}
            </ul>
        );
    }
}
