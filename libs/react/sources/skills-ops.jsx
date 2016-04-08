import React          from "react";
import Card           from "./components/card.jsx";
import CardBody       from "./components/card-body.jsx";
import CardHeader     from "./components/card-header.jsx";
import CardHeaderIcon from "./components/card-header-icon.jsx";

export default class SkillsOps extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardBody>
                    <CardHeaderIcon icon="dns" className="blue-text text-darken-3" />

                    <CardHeader>Operating System</CardHeader>
                </CardBody>
            </Card>
        );
    }
}
