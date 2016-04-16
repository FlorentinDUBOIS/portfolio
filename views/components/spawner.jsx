import React from "react";
import {remove, append} from "./utils.jsx";

export class Spawner extends React.Component {
    constructor( props ) {
        super( props );

        this.state = {
            sentence: parseInt( Math.random() * 100 ) % this.props.sentences.length,
            charat: 0,
            sens: 1,
            text: ""
        };
    }

    componentDidMount() {
        let self = this;

        this.interval = setInterval(() => {
            if( self.state.charat > self.props.sentences[self.state.sentence].length ) {
                self.state.sens = -1;
            } else if( self.state.charat < 0 ) {
                self.state.sens   = 1;
                self.state.charat = 0;
                self.state.sentence = parseInt( Math.random() * 100 ) % self.props.sentences.length;
            }

            let text = "";
            for( let i = 0; i < self.state.charat; ++i ) {
                text += self.props.sentences[self.state.sentence].charAt( i );
            }

            self.setState({
                sens:   self.state.sens,
                charat: self.state.charat + 1 * self.state.sens,
                sentence: self.state.sentence,
                text: text
            });
        }, 200 );
    }

    componentWillUnmount() {
        clearInterval( this.interval );
    }

    render() {
        return(
            <span style={append({minHeight: "30px", padding: "0 1px"}, this.props.style || {})} {...remove(this.props, ['sentence', 'style'])}>{this.state.text}</span>
        );
    }
}
