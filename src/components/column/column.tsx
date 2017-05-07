import * as React from 'react'

import { Container } from '../container/container'
import { GenericProps } from '../generic-props'

export class Column extends React.Component<GenericProps, void> {
  public render() {
    const { style, children, ...rest } = this.props

    return (
      <Container { ...rest } style={{ ...this.style, ...style }}>
        { children }
      </Container>
    )
  }

  private style: React.CSSProperties = {
    flexDirection: 'column',

    width: 'initial',
    height: 'initial'
  }
}
