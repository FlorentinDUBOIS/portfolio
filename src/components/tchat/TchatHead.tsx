import * as React from 'react'
import * as PropTypes from 'prop-types'
import {fade} from 'material-ui/utils/colorManipulator';
import {darkBlack, white} from 'material-ui/styles/colors'
import {Subscription, Observable} from 'rxjs'
import {v4 as uuid} from 'uuid'

import {tchat as actions} from '../../actions'
import {Translate} from '..'
import {IContext} from '../../context'
import {rx} from '../../helpers'

export namespace TchatHead {
  export interface Props {
    style?: React.CSSProperties
  }

  export interface State {}
  export interface Context extends IContext {}
  export interface Style {
    root: React.CSSProperties
    spacer: React.CSSProperties
    close: React.CSSProperties
  }
}

export class TchatHead extends React.Component<TchatHead.Props, TchatHead.State> {

  public componentDidMount() {
    const { store }: TchatHead.Context = this.context

    this.subscription = Observable
      .fromEvent(document.getElementById(this.close), 'click')
      .subscribe(() => {
        store.dispatch({
          type: actions.EAction.HIDE
        })
      })
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    const { root, close, spacer } = this.styles
    const { style } = this.props

    return (
      <div style={{ ...root, ...style }}>
        <Translate name="ai.head" />
        <span style={ spacer }></span>
        <i id={this.close} style={ close } className="material-icons">close</i>
      </div>
    )
  }

  private readonly styles: TchatHead.Style = {
    root: {
      padding: 10,
      backgroundColor: fade(darkBlack, 0.7),
      color: white,
      borderRadius: '3px 3px 0 0',
      display: 'flex',
      alignItems: 'center'
    },

    spacer: {
      flex: 1
    },

    close: {
      cursor: 'pointer'
    }
  }

  private readonly close: string = uuid()
  private subscription: Subscription = void 0
  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
