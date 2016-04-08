import React          from "react";
import Card           from "./components/card.jsx";
import CardBody       from "./components/card-body.jsx";
import CardHeader     from "./components/card-header.jsx";
import CardHeaderIcon from "./components/card-header-icon.jsx";

export default class SkillsNetwork extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardBody>
                    <CardHeaderIcon icon="settings_ethernet" className="blue-text text-darken-3" />

                    <CardHeader>Network knowledge</CardHeader>
                </CardBody>
            </Card>
        );
    }
}
