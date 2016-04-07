import React from "react";

export default class PresentationImage extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="center-align" >
            <img className="circle responsive-img" style={{ margin: "1rem auto"  }} src="https://gravatar.com/avatar/4ee6863b50bd08aa0f487ad06ef67d79?s=160" />
        </div>;
    }
}
