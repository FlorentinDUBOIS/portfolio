import React                    from "react";
import PresentationName         from "./presentation-name.jsx";
import PresentationImage        from "./presentation-image.jsx";
import PresentationAutocomplete from "./presentation-autocomplete.jsx";
import Icon                     from "./icon.jsx";

export default class Presentation extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="blue darken-3" >
            <div className="row" >
                <div className="col s10 m6 l4 offset-s1 offset-m3 offset-l4 overflow-parent" >
                    <div className="card" >
                        <div className="card-content" >
                            <PresentationImage />
                            <PresentationName />
                            <PresentationAutocomplete />
                        </div>

                        <div className="card-action center-align" >
                            <a href="https://www.linkedin.com/in/florentin-dubois-73b045114?trk=hp-identity-name" target="_blank" style={{ margin: "0 10px" }} >
                                <img src="/libs/images/linkedin.svg" className="responsive-img" style={{ width: "36px" }} />
                            </a>

                            <a href="https://twitter.com/FlorentinDUBOIS" target="_blank" style={{ margin: "0 10px" }} >
                                <img src="/libs/images/twitter.svg" className="responsive-img" style={{ width: "36px" }} />
                            </a>

                            <a href="https://github.com/FlorentinDUBOIS" target="_blank" style={{ margin: "0 10px" }} >
                                <img src="/libs/images/github.svg" className="responsive-img" style={{ width: "36px" }} />
                            </a>

                            <a href="https://hub.docker.com/r/florentindubois" target="_blank" style={{ margin: "0 10px" }} >
                                <img src="/libs/images/docker.svg" className="responsive-img" style={{ width: "36px" }} />
                            </a>

                            <a href="https://travis-ci.org/FlorentinDUBOIS" target="_blank" style={{ margin: "0 10px" }} >
                                <img src="/libs/images/travis-ci.svg" className="responsive-img" style={{ width: "36px" }} />
                            </a>

                            <a href="mailto:contact@florentin-dubois.fr" style={{ margin: "0 10px" }} >
                                <Icon className="black-text" icon="mail" style={{ fontSize: "26pt" }} />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>;
    }
}
