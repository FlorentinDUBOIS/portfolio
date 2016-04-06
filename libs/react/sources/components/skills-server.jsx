import React from "react";
import Icon from "./icon.jsx";

export default class SkillsServer extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="card" >
            <div className="card-content" >
                <div className="center-align" >
                    <Icon icon="code" className="blue-text text-darken-3" style={{ fontSize: "6rem" }} />
                </div>

                <h3 className="font-size-18 center-align" >“Back-end” coding</h3>
            </div>
        </div>;
    }
}
