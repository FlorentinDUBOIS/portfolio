import React from "react";
import Icon from "./icon.jsx";

export default class SkillsNetwork extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="card" >
            <div className="card-content" >
                <div className="center-align" >
                    <Icon icon="settings_ethernet" className="blue-text text-darken-3" style={{ fontSize: "6rem" }} />
                </div>

                <h3 className="font-size-18 center-align" >Network knowledge</h3>
            </div>
        </div>;
    }
}
