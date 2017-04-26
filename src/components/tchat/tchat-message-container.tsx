import * as React from 'react'

import { GenericProps } from '../generic-props'

export class TchatMessageContainer extends React.Component<GenericProps, void> {
  public render() {
    const { children } = this.props

    return (
      <div style={ this.style } >
        { children }
      </div>
    )
  }

  private readonly style: React.CSSProperties = {
    width: 230,
    height: 280,
    padding: 10,
    margin: 0,
    overflowX: 'auto'
  }
}
