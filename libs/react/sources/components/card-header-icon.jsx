import React from "react";
import Icon  from "./icon.jsx";

export default class CardHeaderIcon extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="center-align" >
            <Icon icon={this.props.icon} style={{ fontSize: "6rem" }} {...this.props} />
        </div>
    }
}
