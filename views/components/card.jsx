import React from "react";
import {merge, remove} from "./utils.jsx";

export class Card extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={merge('card', this.props.className).join( ' ' )} {...remove(this.props, ['className'])}>
                {this.props.children}
            </div>
        );
    }
}

export class CardTitle extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <h2 className={merge('card-title', this.props.className).join( ' ' )} {...remove(this.props, ['className'])}>{this.props.children}</h2>
        );
    }
}

export class CardContent extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={merge('card-content', this.props.className).join( ' ' )} {...remove(this.props, ['className'])}>
                {this.props.children}
            </div>
        );
    }
}

export class CardAction extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={merge('card-action', this.props.className).join( ' ' )} {...remove(this.props, ['className'])}>
                {this.props.children}
            </div>
        );
    }
}

export class CardImage extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <div className={merge('card-image', this.props.className).join( ' ' )} {...remove(this.props, ['className'])}>
                {this.props.children}
            </div>
        );
    }
}
