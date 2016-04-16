import React from "react";
import {remove, append} from "./utils.jsx";

export class Cursor extends React.Component {
    constructor( props ) {
        super( props );

        this.state = {
            apply: false,
            style: {
                borderRight: '1px solid black'
            }
        };
    }

    componentDidMount() {
        let self = this;

        this.interval = setInterval(() => {
            if( self.state.apply ) {
                self.setState({
                    apply: !self.state.apply,
                    style: {
                        borderRight: '1px solid black'
                    }
                });
            } else {
                self.setState({
                    apply: !self.state.apply,
                    style: {
                        borderRight: 'none'
                    }
                });
            }
        }, 450 );
    }

    componentWillUnmount() {
        clearInterval( this.interval );
    }

    render() {
        return(
            <span style={append(this.props.style || {}, this.state.style)} {...remove(this.props, ['style'])}>{this.props.children}</span>
        );
    }
}
