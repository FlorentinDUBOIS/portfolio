import React from "react";

export default class Container extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className="container" >
                <div {...this.props}>
                    {this.props.children}
                </div>
            </div>
        );
    }
}
