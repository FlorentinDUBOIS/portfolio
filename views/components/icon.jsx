import React from "react";
import {merge, remove} from "./utils.jsx";

export class Icon extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <i className={merge("material-icons", this.props.className).join( ' ' )} {...remove(this.props, ["className", "name"])} >{this.props.name}</i>
        );
    }
}
