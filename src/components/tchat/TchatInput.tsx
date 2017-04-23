import * as React from 'react'
import * as PropTypes from 'prop-types'
import {white, grey300 as grey} from 'material-ui/styles/colors'

import {IContext} from '../../context'
import {ai} from '../../actions'

export namespace TchatInput {
  export interface Props {}
  export interface State {}
  export interface Style {
    root: React.CSSProperties,
  }

  export interface Context extends IContext {}
}

export class TchatInput extends React.Component<TchatInput.Props, TchatInput.State> {
  public render() {
    const { root } = this.styles

    return (
      <textarea
          rows={1}
          ref={el => this.textarea = el}
          style={ root }
          onKeyPress={ this.press.bind(this) }
        ></textarea>
    )
  }

  private press(event: React.KeyboardEvent<HTMLTextAreaElement>) {
    const { store }: TchatInput.Context = this.context

    if (event.key === 'Enter') {
      event.preventDefault()
      store.dispatch({
        type: ai.EAction.QUESTION,
        message: this.textarea.value
      })

      this.textarea.value = ''
    }
  }

  private textarea: HTMLTextAreaElement
  private readonly styles: TchatInput.Style = {
    root: {
      boxShadow: `0 -2px 2px 0 ${grey}`,
      backgroundColor: white,
      width: `calc(100% - 20px)`,
      border: 'none',
      resize: 'none',
      outline: 'none',
      fontFamily: 'Roboto',
      fontSize: '1rem',
      padding: 10
    }
  }

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
