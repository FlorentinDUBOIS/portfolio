import React from "react";
import {Card, CardContent, CardTitle} from "./components/card.jsx";
import {Icon} from "./components/icon.jsx";

export class FrontEnd extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardContent>
                    <h3 className="center-align" >
                        <Icon className="blue-text text-darken-3 large" name="web_asset" />
                    </h3>

                    <CardTitle className="center-align" >“Front-end”</CardTitle>
                </CardContent>
            </Card>
        );
    }
}


export class BackEnd extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardContent>
                    <h3 className="center-align" >
                        <Icon className="blue-text text-darken-3 large" name="code" />
                    </h3>

                    <CardTitle className="center-align" >“Back-end”</CardTitle>
                </CardContent>
            </Card>
        );
    }
}

export class OpsSide extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>

                <CardContent>
                    <h3 className="center-align" >
                        <Icon className="blue-text text-darken-3 large" name="dns" />
                    </h3>

                    <CardTitle className="center-align" >Ops-side</CardTitle>
                </CardContent>
            </Card>
        );
    }
}

export class Network extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Card>
                <CardContent>
                    <h3 className="center-align" >
                        <Icon className="blue-text text-darken-3 large" name="settings_ethernet" />
                    </h3>

                    <CardTitle className="center-align" >Network knowledge</CardTitle>
                </CardContent>
            </Card>
        );
    }
}
