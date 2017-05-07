import * as React from 'react'
import * as PropTypes from 'prop-types'
import { Subscription } from 'rxjs'

import { Context } from '../context'
import { translate } from '../../helpers/intl'
import { fromReduxStore } from '../../helpers/rx'
import { GenericProps } from '../generic-props'

interface Props extends GenericProps {
  name: string
}

interface State {
  translation: string
}

export class Translate extends React.Component<Props, State> {
  public constructor(props?: Props, context?: Context) {
    super(props, context)

    this.state = {
      translation: translate(context.store, props.name)
    }
  }

  public componentDidMount() {
    const { store }: Context = this.context
    const { name }: Props = this.props

    this.subscription = fromReduxStore(store)
      .subscribe(state => {
        this.setState({
          translation: translate(store, name)
        })
      })
  }

  public shouldComponentUpdate(nextProps: Readonly<Props>) {
    return this.props.name !== nextProps.name
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public render() {
    const { translation } = this.state
    const { name, children, ...rest } = this.props

    return (
      <span { ...rest }>{ translation }</span>
    )
  }

  private subscription: Subscription = void 0

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
