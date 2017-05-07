import * as React from 'react'

import { GenericProps } from '../generic-props'

export class Container extends React.Component<GenericProps, void> {
  public render() {
    const { style, children, ...rest } = this.props

    return (
      <div style={{ ...this.style, ...style }} { ...rest } >
        { children }
      </div>
    )
  }

  private style: React.CSSProperties = {
    display: 'flex',
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    flexWrap: 'wrap',

    width: '100%',
    height: '100%'
  }
}
