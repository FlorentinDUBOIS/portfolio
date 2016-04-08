import React from "react";

export default class Overflow extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={`overflow${this.props.reverse?"-reverse":""}-parent`} >
                <div {...this.props}>
                    {this.props.children}
                </div>
            </div>
        );
    }
}
