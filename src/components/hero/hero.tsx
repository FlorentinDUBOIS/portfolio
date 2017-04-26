import * as React from 'react'

import { GenericProps } from '../generic-props'

interface Props extends GenericProps {}

export class Hero extends React.Component<Props, void> {
  public render() {
    const { children, style, ...rest } = this.props

    return (
      <div style={{ ...this.style, ...style }} { ...rest } >
        { children }
      </div>
    )
  }

  private readonly style: React.CSSProperties = {
    display: 'flex',

    flex: 1,
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',

    width: '100%',
    height: '100%',

    margin: 0,
    padding: 0,

    backgroundImage: 'url(assets/images/hero.png)',
    backgroundPosition: 'bottom',
    backgroundRepeat: 'no-repeat'
  }
}
