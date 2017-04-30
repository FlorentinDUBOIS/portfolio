import * as React from 'react'
import * as PropTypes from 'prop-types'
import Paper from 'material-ui/Paper'
import { Subscription } from 'rxjs'

import { GenericProps } from '../generic-props'
import { Context } from '../context'
import { TchatHead } from './tchat-head'
import { TchatInput } from './tchat-input'
import { TchatMessage } from './tchat-message'
import { TchatMessageContainer } from './tchat-message-container'
import { Message } from '../../store/ai'
import { fromReduxStore } from '../../helpers/rx'

interface State {
  hidden: boolean
  messages: Message[]
}

export class TchatWindow extends React.Component<GenericProps, State> {
  public constructor(props: GenericProps, context: Context) {
    super(props, context)

    this.state = {
      hidden: true,
      messages: []
    }
  }

  public componentDidMount() {
    const { store }: Context = this.context

    this.subscription = fromReduxStore(store)
      .subscribe(async state => {
        const { messages } = await state.ai
        const { hidden } = state.tchat

        this.setState({ messages, hidden })
      })
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    const { children, ...props } = this.props
    const { messages, hidden } = this.state

    return (
      <Paper { ...props } zDepth={ 1 } hidden={ hidden }>
        <TchatHead />

        <TchatMessageContainer>
          { messages.map((message, index) => <TchatMessage key={ index } message={ message } />) }
        </TchatMessageContainer>

        <TchatInput />
      </Paper>
    )
  }

  private subscription: Subscription
  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
