import * as React from 'react'
import { white, grey800 as grey } from 'material-ui/styles/colors'

import { GenericProps } from '../generic-props'
import { Container } from '../container/container'
import { Translate } from '../translate/translate'

export class Footer extends React.Component<GenericProps, void> {
  public render() {
    return (
      <Container style={ this.style }>
        <Translate name="footer.code" />
        <Translate style={{ marginTop: 10 }} name="footer.copyright" />
      </Container>
    )
  }

  private readonly style: React.CSSProperties = {
    height: 300,
    color: white,
    backgroundColor: grey,
    flexDirection: 'column'
  }
}
