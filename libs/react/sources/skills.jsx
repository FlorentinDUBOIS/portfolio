import React           from "react";
import SkillsServer    from "./skills-server.jsx";
import SkillsOps       from "./skills-ops.jsx";
import SkillsWeb       from "./skills-web.jsx";
import SkillsNetwork   from "./skills-network.jsx";
import SkillsSpeaker   from "./skills-speaker.jsx";
import SkillsCommunity from "./skills-community.jsx";
import Container       from "./components/container.jsx";
import Overflow        from "./components/overflow.jsx";

export default class Skills extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Container>
                <Overflow className="row" >
                    <div className="col s12 m6 l6" >
                        <SkillsWeb />
                    </div>

                    <div className="col s12 m6 l6" >
                        <SkillsServer />
                    </div>
                </Overflow>

                <Overflow className="row" >
                    <div className="col s12 m6 l6" >
                        <SkillsOps />
                    </div>

                    <div className="col s12 m6 l6" >
                        <SkillsNetwork />
                    </div>
                </Overflow>

                <Overflow className="row" >
                    <div className="col s12 m6 l6" >
                        <SkillsSpeaker />
                    </div>

                    <div className="col s12 m6 l6" >
                        <SkillsCommunity />
                    </div>
                </Overflow>
            </Container>
        );
    }
}
