import React from "react";
import {Cursor} from "./components/cursor.jsx";
import {Spawner} from "./components/spawner.jsx";
import {Card, CardContent} from "./components/card.jsx";

const sentences = [
    "Linux lover",
    "Arch Linux user",
    "Web developer",
    "Software developer",
    "Docker user",
    "Software student engineer",
    "Github social developer",
    "Travis CI user",
    "Awesome developer/engineer",
    "Plumber developer",
    "ISEN Student",
    "Long-time system administrator",
    "Open-Source contributor",
    "@FlorentinDUBOIS"
];

export class Presentation extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardContent>
                    <div className="center-align" >
                        <img className="circle responsive-img" style={{ margin: "1rem auto"  }} src="https://gravatar.com/avatar/4ee6863b50bd08aa0f487ad06ef67d79?s=160" />
                    </div>

                    <div className="center-align" >
                        <h1 className="bold" >Florentin DUBOIS</h1>
                    </div>

                    <div className="center-align" >
                        <Cursor>
                            <Spawner className="italic" sentences={sentences} />
                        </Cursor>
                    </div>
                </CardContent>
            </Card>
        );
    }
}
