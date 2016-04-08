import React from "react";

export default class FooterCopyright extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={`footer-copyright ${ this.props.className || "" }`} {...this.props} >
                {this.props.children}
            </div>
        );
    }
}
