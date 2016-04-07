import React                    from "react";
import PresentationName         from "./presentation-name.jsx";
import PresentationImage        from "./presentation-image.jsx";
import PresentationAutocomplete from "./presentation-autocomplete.jsx";
import Card                     from "./card.jsx";
import CardBody                 from "./card-body.jsx";
import CardActions              from "./card-actions.jsx";
import LinkImage                from "./link-image.jsx";
import LinkIcon                 from "./link-icon.jsx";

export default class Presentation extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="blue darken-3" >
            <div className="row" >
                <div className="col s12 m6 l4 offset-m3 offset-l4 overflow-parent" >
                    <Card>
                        <CardBody>
                            <PresentationImage />
                            <PresentationName />
                            <PresentationAutocomplete />
                        </CardBody>

                        <CardActions className="center-align" >
                            <LinkImage href="https://www.linkedin.com/in/florentin-dubois-73b045114?trk=hp-identity-name" src="/libs/images/linkedin.svg" width="36px" />
                            <LinkImage href="https://twitter.com/FlorentinDUBOIS" src="/libs/images/twitter.svg" width="36px" />
                            <LinkImage href="https://github.com/FlorentinDUBOIS" src="/libs/images/github.svg" width="36px" />
                            <LinkImage href="https://hub.docker.com/r/florentindubois" src="/libs/images/docker.svg" width="36px" />
                            <LinkImage href="https://travis-ci.org/FlorentinDUBOIS" src="/libs/images/travis-ci.svg" width="36px" />
                            <LinkIcon  href="mailto:contact@florentin-dubois.fr" icon="mail" width="36px" />
                        </CardActions>
                    </Card>
                </div>
            </div>
        </div>;
    }
}
