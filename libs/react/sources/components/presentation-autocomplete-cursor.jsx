import React from "react";

export default class PresentationAutocompleteCursor extends React.Component {
    constructor( props ) {
        super( props );

        this.state = {
            alternate: true,
            style: {
                borderRight: "1px solid black",
                paddingRight: "2px"
            }
        };
    }

    componentDidMount() {
        let self = this;
        this.interval = setInterval(() => {
            if( self.state.alternate ) {
                self.state.alternate         = false;
                self.state.style.borderRight = "1px solid black";
            } else {
                self.state.alternate         = true;
                self.state.style.borderRight = "none";
            }

            self.setState({
                alternate: self.state.alternate,
                style: {
                    borderRight: self.state.style.borderRight,
                    paddingRight: "2px"
                }
            });
        }, 600 );
    }

    componentWillUnmount() {
        clearInterval( this.interval );
    }

    render() {
        return(
            <span style={ this.state.style } >{ this.props.children }</span>
        );
    }
}
