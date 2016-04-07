import React from "react";

export default class CardBody extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className="card-content" >
                <div {...this.props} > {this.props.children}</div>
            </div>
        );
    }
}
