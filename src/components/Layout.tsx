import * as React from 'react'
import * as PropTypes from 'prop-types'
import {RouteComponentProps} from 'react-router'
import FloatingActionButton from 'material-ui/FloatingActionButton'

import {IContext} from '../context'
import {Hero, Translate, Heading, Tchat} from '.'

export namespace Layout {
  export interface Props extends RouteComponentProps<string> {}
  export interface Context extends IContext {}
  export interface Styles {
    root: React.CSSProperties,
    hero: React.CSSProperties,
    h1: React.CSSProperties,
    h2: React.CSSProperties,
    img: React.CSSProperties,
    tchat: React.CSSProperties
  }
}

export class Layout extends React.Component<Layout.Props, void> {
  public render() {
    return (
      <div style={this.styles.root}>
        <Hero style={this.styles.hero}>
          <img style={this.styles.img} src="//secure.gravatar.com/avatar/4ee6863b50bd08aa0f487ad06ef67d79?s=192" alt="Florentin DUBOIS"/>
          <h1 style={this.styles.h1}><Translate name="me.name" /></h1>
          <h2 style={this.styles.h2}><Translate name="me.status"/></h2>
        </Hero>

        <Tchat style={this.styles.tchat} />
      </div>
    )
  }

  private readonly styles: Layout.Styles = {
    root: {
      width: '100%',
      height: '100%',

      margin: 0,
      padding: 0
    },

    h1: {
      ...Heading.styles.get(Heading.Types.H1),
      margin: '0 0 12px 0'
    },

    h2: Heading.styles.get(Heading.Types.H2),

    img: {
      borderRadius: '50%',

      margin: '0 0 6% 0'
    },

    tchat: {
      position: 'fixed',
      bottom: 32,
      right: 32
    },

    hero: {
      color: this.context.muiTheme.palette.alternateTextColor,
      backgroundColor: this.context.muiTheme.palette.primary1Color
    }
  }

  public static readonly contextTypes: Layout.Context = {
    muiTheme: PropTypes.object.isRequired
  }
}
