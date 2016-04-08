import React          from "react";
import Card           from "./components/card.jsx";
import CardBody       from "./components/card-body.jsx";
import CardHeader     from "./components/card-header.jsx";
import CardHeaderIcon from "./components/card-header-icon.jsx";

export default class SkillsCommunity extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardBody>
                    <CardHeaderIcon icon="people" className="blue-text text-darken-3" />

                    <CardHeader>Community</CardHeader>
                </CardBody>
            </Card>
        );
    }
}
