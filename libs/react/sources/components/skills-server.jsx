import React          from "react";
import Card           from "./card.jsx";
import CardBody       from "./card-body.jsx";
import CardHeader     from "./card-header.jsx";
import CardHeaderIcon from "./card-header-icon.jsx";

export default class SkillsServer extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <Card>
            <CardBody>
                <CardHeaderIcon icon="code" className="blue-text text-darken-3" />

                <CardHeader>“Back-end”</CardHeader>
            </CardBody>
        </Card>;
    }
}
