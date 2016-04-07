import React from "react";

export default class TravisCI extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <a target="_blank" href={"https://travis-ci.org/FlorentinDUBOIS/" + this.props.depot + "/builds"} {...this.props} >
                {this.props.children}
            </a>
        );
    }
}
