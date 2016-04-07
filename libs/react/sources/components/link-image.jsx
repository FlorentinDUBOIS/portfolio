import React from "react";

export default class LinkImage extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <a href={this.props.href} target="_blank" style={{ margin: "0 10px" }} >
                <img src={this.props.src} className="responsive-img" style={{ width: this.props.width }} />
            </a>
        );
    }
}
