import * as React from 'react'
import Paper from 'material-ui/Paper'

export namespace TchatBox {
  export interface Props {
    style?: React.CSSProperties
    hide: boolean
  }

  export interface State {}
  export interface Style {
    root: React.CSSProperties
  }
}

export class TchatBox extends React.Component<TchatBox.Props, TchatBox.State> {
  public render() {
    const {root} = this.styles
    const {hide, style} = this.props

    if (hide) {
      root.display = 'none'
    } else {
      root.display = 'initial'
    }

    return (
      <Paper style={{...root, ...style}} zDepth={1}>
        {this.props.children}
      </Paper>
    )
  }

  private readonly styles: TchatBox.Style = {
    root: {
      borderRadius: 4
    }
  }
}
