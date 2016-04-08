import React       from "react";
import Card        from "./components/card.jsx";
import CardHeader  from "./components/card-header.jsx";
import CardBody    from "./components/card-body.jsx";
import CardActions from "./components/card-actions.jsx";
import Github      from "./components/github.jsx";
import TravisCI    from "./components/travis-ci.jsx";

export default class ProjectsContributions extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className="row" >
                <div className="col s12 m6 l6" >
                    <Card>
                        <CardBody>
                            <CardHeader>OVH Monitor</CardHeader>

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
        );
    }
}
