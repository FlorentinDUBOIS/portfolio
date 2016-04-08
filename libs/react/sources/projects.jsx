import React                 from "react";
import Icon                  from "./components/icon.jsx";
import Collapsible           from "./components/collapsible.jsx";
import CollapsibleItem       from "./components/collapsible-item.jsx";
import CollapsibleHeader     from "./components/collapsible-header.jsx";
import CollapsibleBody       from "./components/collapsible-body.jsx";
import ProjectsContributions from "./projects-contributions.jsx";
import Container             from "./components/container.jsx";

export default class Projects extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className="blue darken-3" style={{ padding: "10rem 0 8rem 0" }} >
                <Container>
                    <Collapsible>
                        <CollapsibleItem>
                            <CollapsibleHeader><Icon className="blue-text text-darken-3" icon="code" />Contributing</CollapsibleHeader>

                            <CollapsibleBody>
                                <ProjectsContributions />
                            </CollapsibleBody>
                        </CollapsibleItem>

                        <CollapsibleItem>
                            <CollapsibleHeader><Icon className="blue-text text-darken-3" icon="people" />Community</CollapsibleHeader>

                            <CollapsibleBody>

                            </CollapsibleBody>
                        </CollapsibleItem>

                        <CollapsibleItem>
                            <CollapsibleHeader><Icon className="blue-text text-darken-3" icon="chat" />Speaking</CollapsibleHeader>

                            <CollapsibleBody>

                            </CollapsibleBody>
                        </CollapsibleItem>
                    </Collapsible>
                </Container>
            </div>
        );
    }
}
