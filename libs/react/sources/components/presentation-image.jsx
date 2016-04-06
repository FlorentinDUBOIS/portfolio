import React from "react";

export default class PresentationImage extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="center-align" >
            <img className="circle responsive-img" style={{ width: "140px", margin: "1rem auto"  }} src="/libs/images/me.png" />
        </div>;
    }
}
