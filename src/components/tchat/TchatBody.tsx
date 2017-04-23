import * as React from 'react'
import {white} from 'material-ui/styles/colors'

export namespace TchatBody {
  export interface Props {
    style?: React.CSSProperties
  }

  export interface State {}
  export interface Style {
    root: React.CSSProperties
  }
}

export class TchatBody extends React.Component<TchatBody.Props, TchatBody.State> {
  public render() {
    return (
      <div style={{...this.styles.root, ...this.props.style}}>
        {this.props.children}
      </div>
    )
  }

  private readonly styles: TchatBody.Style = {
    root: {
      width: 300,
      height: 350,

      backgroundColor: white,

      overflow: 'auto'
    }
  }
}
