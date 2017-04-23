import * as React from 'react'

export namespace Hero {
  export interface Props {
    style?: React.CSSProperties
  }

  export interface State {}
  export interface Styles {
    root: React.CSSProperties
  }
}

export class Hero extends React.Component<Hero.Props, Hero.State> {
  public render() {
    const {style, children} = this.props

    return (
      <div style={{...this.styles.root, ...style || {}}} >
        {children}
      </div>
    )
  }

  private readonly styles: Hero.Styles = {
    root: {
      width: '100%',
      height: '100%',

      display: 'flex',
      justifyContent: 'center',
      alignItems: 'center',

      flexDirection: 'column',

      backgroundImage: 'url(assets/images/hero.png)',
      backgroundPosition: 'bottom',
      backgroundRepeat: 'no-repeat',

      margin: 0,
      padding: 0
    }
  }
}
