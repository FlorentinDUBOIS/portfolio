import * as React from 'react'
import * as PropTypes from 'prop-types'
import { RouteComponentProps } from 'react-router'

import * as heading from '../heading/heading.hlps'
import { Hero } from '../hero/hero'
import { Translate } from '../translate/translate'
import { Context } from '../context'
import { GenericProps } from '../generic-props'
import { Tchat } from '../tchat/tchat'

interface Props extends RouteComponentProps<string>, GenericProps {}

export class Layout extends React.Component<Props, void> {
  public render() {
    const { root, hero, img, h1, h2 } = this

    return (
      <div style={ root }>
        <Hero style={ hero }>
          <img style={ img } src="//secure.gravatar.com/avatar/4ee6863b50bd08aa0f487ad06ef67d79?s=192" alt="Florentin DUBOIS"/>
          <h1 style={ h1 }><Translate name="me.name" /></h1>
          <h2 style={ h2 }><Translate name="me.status"/></h2>
        </Hero>

        <Tchat />
      </div>
    )
  }

  private readonly root: React.CSSProperties = {
    width: '100%',
    height: '100%',

    margin: 0,
    padding: 0
  }

  private readonly hero: React.CSSProperties = {
    color: this.context.muiTheme.palette.alternateTextColor,
    backgroundColor: this.context.muiTheme.palette.primary1Color
  }

  private readonly h1: React.CSSProperties = {
    ...heading.styles.get(heading.Types.H1),
    margin: '0 0 12px 0'
  }

  private readonly h2: React.CSSProperties = heading.styles.get(heading.Types.H2)
  private readonly img: React.CSSProperties = {
    borderRadius: '50%',
    margin: '0 0 6% 0'
  }

  public static readonly contextTypes = {
    muiTheme: PropTypes.object.isRequired
  }
}
