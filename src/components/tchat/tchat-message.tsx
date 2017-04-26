import * as React from 'react'
import * as PropTypes from 'prop-types'

import { Context } from '../context'
import { GenericProps } from '../generic-props'
import { Message } from '../../store/ai'

interface Props extends GenericProps {
  message: Message
}

export class TchatMessage extends React.Component<Props, void> {
  public render() {
    const { message, answer } = this.props.message
    const { muiTheme }: Context = this.context

    if (answer) {
      this.style.backgroundColor = muiTheme.palette.accent1Color
      this.style.marginRight = 10
    } else {
      this.style.backgroundColor = muiTheme.palette.primary1Color
      this.style.marginLeft = 10
    }

    return (
      <div style={ this.style }  >
        { message }
      </div>
    )
  }

  private style: React.CSSProperties = {
    borderRadius: 5,
    padding: 10,
    marginBottom: 10,
    color: (this.context as Context).muiTheme.palette.alternateTextColor
  }

  public static readonly contextTypes = {
    muiTheme: PropTypes.object.isRequired
  }
}
