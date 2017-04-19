import * as React from 'react'
import * as PropTypes from 'prop-types'
import {RouteComponentProps} from 'react-router'
import {AppBar} from 'material-ui'
import {Subscription} from 'rxjs'

import {IContext} from '../context'
import {rx, intl} from '../helpers'

export namespace Layout {
  export interface Props extends RouteComponentProps<string> {}
  export interface Context extends IContext {}
}

export class Layout extends React.Component<Layout.Props, void> {
  public componentDidMount() {
    const {store}:  Layout.Context = this.context

    this.subscription = rx
      .toObservable(store)
      .subscribe(() => {
        this.setState({})
      })
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    const {store}: Layout.Context = this.context

    return (
      <AppBar title={intl.translate(store, 'me.name')} />
    )
  }

  private subscription: Subscription = void 0
  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
