import React from "react";
import Icon from "./icon.jsx";

export default class SkillsSpeaker extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="card" >
            <div className="card-content" >
                <div className="center-align" >
                    <Icon icon="forum" className="blue-text text-darken-3" style={{ fontSize: "6rem" }} />
                </div>

                <h3 className="font-size-18 center-align" >Speaking</h3>
            </div>
        </div>;
    }
}
