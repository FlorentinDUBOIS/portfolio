import * as React from 'react'
import * as PropTypes from 'prop-types'
import { Subscription, Observable } from 'rxjs'

import { GenericProps } from '../generic-props'
import { Context } from '../context'
import { Types } from '../../store/ai'

export class TchatInput extends React.Component<GenericProps, void> {
  public componentDidMount() {
    this.subscription = Observable
      .fromEvent<React.KeyboardEvent<HTMLTextAreaElement>>(this.textarea, 'keypress')
      .subscribe(event => {
        if (event.keyCode === 13) {
          event.preventDefault()

          const { store }: Context = this.context
          const type = Types.POST_MESSAGE
          const message = this.textarea.value

          if (message.trim() !== '') {
            store.dispatch({ type, message })
          }

          this.textarea.value = ''
        }
      })
  }

  public conponentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    return (
      <textarea
          style={ this.style }
          ref={ textarea => this.textarea = textarea }
          rows={ 2 }
        />
    )
  }

  private textarea: HTMLTextAreaElement
  private subscription: Subscription
  private readonly style: React.CSSProperties = {
    width: 'calc(100% - 10px)',
    border: 'none',
    outline: 'none',
    resize: 'none',
    boxShadow: '0 -2px 4px rgba(0, 0, 0, 0.2)',
    fontSize: '1.2rem',
    padding: 5
  }

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
