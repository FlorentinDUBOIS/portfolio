import React from "react";
import Card           from "./card.jsx";
import CardBody       from "./card-body.jsx";
import CardHeader     from "./card-header.jsx";
import CardHeaderIcon from "./card-header-icon.jsx";

export default class SkillsWeb extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <Card>
            <CardBody>
                <CardHeaderIcon icon="web" className="blue-text text-darken-3" />

                <CardHeader>“Front-end”</CardHeader>
            </CardBody>
        </Card>;
    }
}
