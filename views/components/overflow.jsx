import React from "react";
import {merge, remove} from "./utils.jsx";

export class Overflow extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={merge(`overflow${ this.props.reverse? '-reverse': '' }`, this.props.className)} {...remove(this.props, ['className', 'reverse'])} >{this.props.children}</div>
        );
    }
}
