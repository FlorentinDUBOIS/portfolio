import React from "react";

export default class CardActions extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="card-action" >
            <div {...this.props} >{this.props.children}</div>
        </div>;
    }
}
