import React from "react";
import PresentationAutocompleteCursor from "./presentation-autocomplete-cursor.jsx";

const phrases = [
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
    "Open-Source contributor"
];

export default class PresentationAutocomplete extends React.Component {
    constructor( props ) {
        super( props );

        this.state = {
            phrase: parseInt( Math.random() * 100 ) % phrases.length,
            charat: 0,
            sens: 1,
            text: ""
        };
    }

    componentDidMount() {
        let self = this;
        this.interval = setInterval(() => {
            if( self.state.charat > phrases[self.state.phrase].length ) {
                self.state.sens = -1;
            } else if( self.state.charat < 0 ) {
                self.state.sens   = 1;
                self.state.charat = 0;
                self.state.phrase = parseInt( Math.random() * 100 ) % phrases.length;
            }

            let text = "";
            for( let i = 0; i < self.state.charat; ++i ) {
                text += phrases[self.state.phrase].charAt( i );
            }

            self.setState({
                sens:   self.state.sens,
                charat: self.state.charat + 1 * self.state.sens,
                phrase: self.state.phrase,
                text: text
            });
        }, 200 );
    }

    componentWillUnmount() {
        clearInterval( this.interval );
    }

    render() {
        return <h2 className="center-align italic font-size-16" style={{ minHeight: "30px" }} >
            <PresentationAutocompleteCursor>{ this.state.text }</PresentationAutocompleteCursor>
        </h2>;
    }
}
