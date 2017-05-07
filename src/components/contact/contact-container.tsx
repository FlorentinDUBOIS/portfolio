import * as React from 'react'
import Paper from 'material-ui/Paper'

import { GenericProps } from '../generic-props'

export class ContactContainer extends React.Component<GenericProps, void> {
  public render() {
    const { style, children, ...rest } = this.props

    return (
      <Paper zDepth={ 1 } style={{ ...this.style, ...style }} { ...rest } >
        { children }
      </Paper>
    )
  }

  private style: React.CSSProperties = {
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',

    width: '100%',
    height: 60
  }
}
