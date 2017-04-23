import * as React from 'react'
import * as PropTypes from 'prop-types'
import {Subscription} from 'rxjs'

import {IContext} from '../context'
import {intl, rx} from '../helpers'

export namespace Translate {
  export interface Props {
    name: string
  }

  export interface State {
    translation: string
  }

  export interface Context extends IContext {}
}

export class Translate extends React.Component<Translate.Props, Translate.State> {

  public constructor(props?: Translate.Props, context?: Translate.Context) {
    super(props, context)

    this.state = {
      translation: intl.translate(context.store, props.name)
    }
  }

  public componentDidMount() {
    const {store}: Translate.Context = this.context
    const {name} = this.props

    this.subscription = rx
      .toObservable(store)
      .subscribe(() => {
        this.setState({translation: intl.translate(store, name)})
      })
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    return (
      <span>{this.state.translation}</span>
    )
  }

  private subscription: Subscription = void 0
  public static readonly contextTypes: Translate.Context = {
    store: PropTypes.object.isRequired
  }
}
