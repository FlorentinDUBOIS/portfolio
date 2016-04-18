import React from "react";
import {Cursor} from "./components/cursor.jsx";
import {Spawner} from "./components/spawner.jsx";
import {Card, CardContent, CardAction} from "./components/card.jsx";

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

const contacts = [
    { href: "https://www.linkedin.com/in/florentin-dubois-73b045114?trk=hp-identity-name", src: "/libs/images/linkedin.svg" },
    { href: "https://twitter.com/FlorentinDUBOIS",                                         src: "/libs/images/twitter.svg" },
    { href: "https://github.com/FlorentinDUBOIS",                                          src: "/libs/images/github.svg" },
    { href: "https://hub.docker.com/r/florentindubois",                                    src: "/libs/images/docker.svg" },
    { href: "https://travis-ci.org/FlorentinDUBOIS",                                       src: "/libs/images/travis-ci.svg" }
];

export class Presentation extends React.Component {
    constructor( props ) {
        super( props );
    }

    createContactItem( contact ) {
        return(
            <a key={`${(Math.random() * 100) % 100}-${(Math.random() * 100) % 100}`} href={contact.href} target="_blank" style={{ margin: "0 10px" }} >
                <img src={contact.src} className="responsive-img" style={{ width: "36px" }} />
            </a>
        );
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

                <CardAction className="center-align" >
                    {contacts.map( this.createContactItem )}
                </CardAction>
            </Card>
        );
    }
}
