import React from "react";
import Card from "./card.jsx";
import CardHeader from "./card-header.jsx";
import CardBody from "./card-body.jsx";
import CardActions from "./card-actions.jsx";
import Github from "./github.jsx";
import TravisCI from "./travis-ci.jsx";

export default class ProjectsContributions extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div>
                <div className="row" >
                    <div className="col s12 m6 l6" >
                        <Card>
                            <CardBody>
                                <CardHeader className="bold" >OVH Monitor</CardHeader>

                            </CardBody>

                            <CardActions className="center-align" >
                                <Github depot="ovh-monitor" >
                                    View on Github
                                </Github>
                            </CardActions>
                        </Card>
                    </div>

                    <div className="col s12 m6 l6" >

                    </div>
                </div>
            </div>
        );
    }
}
