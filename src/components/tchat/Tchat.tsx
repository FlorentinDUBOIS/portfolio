import * as React from 'react'
import * as PropTypes from 'prop-types'
import FloatingActionButton from 'material-ui/FloatingActionButton'
import {v4 as uuid} from 'uuid'
import {Observable, Subscription} from 'rxjs'

import {TchatBox, TchatHead, TchatBody, TchatInput, TchatAnswer, TchatQuestion} from '.'
import {IContext} from '../../context'
import {tchat} from '../../actions'
import {rx} from '../../helpers'
import {IMessage} from '../../store'

export namespace Tchat {
  export interface Props {
    style?: React.CSSProperties
  }

  export interface State {
    hide: boolean
    messages: IMessage[]
  }

  export interface Style {
    root: React.CSSProperties,
    tchat: React.CSSProperties
  }

  export interface Context extends IContext {}
  export interface Subscriptions {
    button: Subscription
    store: Subscription
  }
}

export class Tchat extends React.Component<Tchat.Props, Tchat.State> {

  public constructor(props?: Tchat.Props, context?: Tchat.Context) {
    super(props, context)

    this.state = {
      hide: true,
      messages: []
    }
  }

  public componentDidMount() {
    const {store}: Tchat.Context = this.context

    this.subscriptions = {
      button: Observable
      .fromEvent(document.getElementById(this.button), 'click')
      .subscribe(() => {
        const { hide } = this.state

        let type: tchat.EAction = void 0
        if (hide) {
          type = tchat.EAction.DISPLAY
        } else {
          type = tchat.EAction.HIDE
        }

        store.dispatch({ type })
      }),

      store: rx
        .toObservable(store)
        .subscribe(state => {
          const { hide } = state.tchat
          const { messages } = state.ai

          this.setState({ hide, messages })
        })
    }
  }

  public componentWillUnmount() {
    this.subscriptions.button.unsubscribe()
    this.subscriptions.store.unsubscribe()
  }

  public render() {
    const { hide, messages } = this.state
    const { root, tchat } = this.styles
    const { style } = this.props

    return (
      <div style={{ ...root, ...style }}>
        <TchatBox hide={hide} style={tchat} >
          <TchatHead />

          <TchatBody>
            {
              messages.map((message, index) => {
                if (message.answer) {
                  return (
                    <TchatAnswer key={index} message={message.message} />
                  )
                } else {
                  return (
                    <TchatQuestion key={index} message={message.message} />
                  )
                }
              })
            }
          </TchatBody>

          <TchatInput />
        </TchatBox>

        <FloatingActionButton id={this.button} secondary={true}>
          <i className="material-icons">message</i>
        </FloatingActionButton>
      </div>
    )
  }

  private button: string = uuid()
  private subscriptions: Tchat.Subscriptions = void 0
  private readonly styles: Tchat.Style = {
    root: {},
    tchat: {
      position: 'absolute',

      right: 0,
      top: -458
    }
  }

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
