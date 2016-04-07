import React                 from "react";
import Icon                  from "./icon.jsx";
import Collapsible           from "./collapsible.jsx";
import CollapsibleItem       from "./collapsible-item.jsx";
import CollapsibleHeader     from "./collapsible-header.jsx";
import CollapsibleBody       from "./collapsible-body.jsx";
import ProjectsContributions from "./projects-contributions.jsx";

export default class Projects extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return <div className="blue darken-3" style={{ padding: "7rem 0 2rem 0" }} >
            <div className="container" >
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
            </div>
        </div>;
    }
}
