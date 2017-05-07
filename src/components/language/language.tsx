import * as React from 'react'
import { fade } from 'material-ui/utils/colorManipulator'
import { Subscription, Observable } from 'rxjs'
import {
  amber500,
  blue500,
  blueGrey500,
  brown500,
  cyan500,
  deepOrange500,
  deepPurple500,
  green500,
  grey500,
  indigo500,
  lightBlue500,
  lightGreen500,
  lime500,
  orange500,
  pink500,
  purple500,
  red500,
  teal500,
  yellow800,
  white
} from 'material-ui/styles/colors'

import { GenericProps } from '../generic-props'

interface Props extends GenericProps {
  name: string
  line: number
  total: number
}

interface State {
  style: React.CSSProperties
}

export class Language extends React.Component<Props, State> {

  public constructor(props?: Props, context?) {
    super(props, context)

    this.state = {
      style: {}
    }
  }

  public componentDidMount() {
    this.mouseEnterSubscription = Observable
      .fromEvent(this.div, 'mouseenter')
      .subscribe(event => {
        let { style } = this.state

        style.transform = 'scale(1.2, 1.2)'

        this.setState({
          style
        })
      })

    this.mouseLeaveSubscription = Observable
      .fromEvent(this.div, 'mouseleave')
      .subscribe(event => {
        this.setState({
          style: {}
        })
      })
  }

  public componentWillUnmout() {
    this.mouseEnterSubscription.unsubscribe()
    this.mouseLeaveSubscription.unsubscribe()
  }

  public render() {
    const { name } = this.props
    const style: React.CSSProperties = { ...this.style, ...this.state.style }

    return (
      <div ref={ div => this.div = div } style={ style }>
        <span>{ name }</span>
      </div>
    )
  }

  private div: HTMLDivElement
  private readonly color = Language.colors[Math.floor(Math.random() * 100) % Language.colors.length]
  private readonly style: React.CSSProperties = {
    margin: 10,
    width: 128,
    height: 128,
    boxShadow: '0 0 8px rgba(0, 0, 0, 0.2)',
    borderRadius: 3,
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    fontSize: '1rem',
    color: white,
    backgroundColor: fade(this.color, 0.5),
    border: `3px solid ${fade(this.color, 0.6)}`,
    textShadow: '0 0 6px rgba(0, 0, 0, 0.2)',
    fontWeight: 'bold',
    transition: 'all 0.5s'
  }

  private mouseEnterSubscription: Subscription
  private mouseLeaveSubscription: Subscription
  private static readonly colors: string[] = [
    amber500,
    blue500,
    blueGrey500,
    brown500,
    cyan500,
    deepOrange500,
    deepPurple500,
    green500,
    grey500,
    indigo500,
    lightBlue500,
    lightGreen500,
    lime500,
    orange500,
    pink500,
    purple500,
    red500,
    teal500,
    yellow800
  ]
}
