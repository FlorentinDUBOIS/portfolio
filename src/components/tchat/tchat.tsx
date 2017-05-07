import * as React from 'react'
import * as PropTypes from 'prop-types'
import FloatingActionButton from 'material-ui/FloatingActionButton'
import MessageIcon from 'material-ui/svg-icons/communication/message'

import { TchatWindow } from './tchat-window'
import { Context } from '../context'
import { GenericProps } from '../generic-props'
import { Types } from '../../store/tchat'

export class Tchat extends React.Component<GenericProps, void> {
  public toggle() {
    const { store }: Context = this.context
    const { hidden } = store.getState().tchat
    const { DISPLAY, HIDE } = Types

    let type = HIDE
    if (hidden) {
      type = DISPLAY
    }

    store.dispatch({ type })
  }

  public render() {
    return (
      <div style={ this.style }>
        <TchatWindow style={ this.windowStyle } />

        <FloatingActionButton
            onClick={ this.toggle.bind(this) }
            ref={ button => this.button = button}
            secondary={ true }
          >

          <MessageIcon />
        </FloatingActionButton>
      </div>
    )
  }

  private button: FloatingActionButton
  private readonly style: React.CSSProperties = {
    position: 'fixed',
    bottom: 16,
    right: 32,
    zIndex: 100
  }

  private readonly windowStyle: React.CSSProperties = {
    position: 'absolute',
    right: 0,
    bottom: 80
  }

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
