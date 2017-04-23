import * as React from 'react'
import {indigo500} from 'material-ui/styles/colors'
import {fade} from 'material-ui/utils/colorManipulator'

export namespace TchatAnswer {
  export interface Props {
    message: string
  }

  export interface State {}
  export interface Style {
    root: React.CSSProperties
  }
}

export class TchatAnswer extends React.Component<TchatAnswer.Props, TchatAnswer.State> {
  public render() {
    const { message } = this.props
    const { root } = this.styles

    return (
      <div style={ root } >{ message }</div>
    )
  }

  private readonly styles: TchatAnswer.Style = {
    root: {
      padding: 10,
      borderRadius: 5,
      margin: 5,
      marginRight: 15,
      width: `calc(100% - 40px)`,
      backgroundColor: fade(indigo500, 0.1)
    }
  }
}
