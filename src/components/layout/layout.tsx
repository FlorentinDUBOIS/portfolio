import * as React from 'react'
import * as PropTypes from 'prop-types'
import { RouteComponentProps } from 'react-router'
import Card from 'material-ui/Card'
import CardText from 'material-ui/Card/CardText'
import CardHeader from 'material-ui/Card/CardHeader'
import AppBar from 'material-ui/AppBar'
import IconButton from 'material-ui/IconButton'
import MailIcon from 'material-ui/svg-icons/content/mail'

import * as heading from '../heading/heading.hlps'
import { Hero } from '../hero/hero'
import { Translate } from '../translate/translate'
import { GenericProps } from '../generic-props'
import { Tchat } from '../tchat/tchat'
import { Container } from '../container/container'
import { Column } from '../column/column'
import { Languages } from '../languages/languages'
import { ContactContainer } from '../contact/contact-container'
import { GitHubIcon } from '../icons/GitHubIcon'
import { TwitterIcon } from '../icons/TwitterIcon'
import { LinkedInIcon } from '../icons/LinkedIn'
import { Footer } from '../footer/footer'

interface Props extends RouteComponentProps<string>, GenericProps {}

export class Layout extends React.Component<Props, void> {
  public render() {
    const { root, hero, img, h1, h2 } = this

    return (
      <div style={ root }>
        <Hero style={ hero }>
          <AppBar
              zDepth={ 0 }
              style={{ position: 'absolute', top: 0, left: 0 }}
              showMenuIconButton={ false }
            />

          <img style={ img } src="//secure.gravatar.com/avatar/4ee6863b50bd08aa0f487ad06ef67d79?s=192" alt="Florentin DUBOIS"/>
          <h1 style={ h1 }><Translate name="me.name" /></h1>
          <h2 style={ h2 }><Translate name="me.status"/></h2>
        </Hero>

        <Tchat />

        <ContactContainer className="text">
          <IconButton href="//github.com/FlorentinDUBOIS">
            <GitHubIcon />
          </IconButton>

          <IconButton href="//twitter.com/FlorentinDUBOIS">
            <TwitterIcon />
          </IconButton>

          <IconButton href="//linkedin.com/in/florentin-dubois-73b045114/">
            <LinkedInIcon />
          </IconButton>

          <IconButton href="mailto:contact@florentin-dubois.fr">
            <MailIcon />
          </IconButton>
        </ContactContainer>

        <Container style={{ height: 'initial', padding: '2rem 0' }}>
          <Column>
            <Container>
              <Column style={{ flex: 1 }}>
                <Card style={{ margin: 10 }}  >
                  <CardHeader
                    title={ <Translate name="me.as.frontend.developer.head" /> }
                    subtitle={ <Translate name="me.as.frontend.developer.subhead" /> }
                  />

                  <CardText>
                    <Translate name="me.as.frontend.developer.text" />
                  </CardText>
                </Card>
              </Column>

              <Column style={{ flex: 1 }}>
                <Card style={{ margin: 10 }}>
                  <CardHeader
                    title={ <Translate name="me.as.backend.developer.head" /> }
                    subtitle={ <Translate name="me.as.backend.developer.subhead" /> }
                  />

                  <CardText>
                    <Translate name="me.as.backend.developer.text" />
                  </CardText>
                </Card>
              </Column>

              <Column style={{ flex: 1 }}>
                <Card style={{ margin: 10 }}>
                  <CardHeader
                    title={ <Translate name="me.as.ops.head" /> }
                    subtitle={ <Translate name="me.as.ops.subhead" /> }
                  />

                  <CardText>
                    <Translate name="me.as.ops.text" />
                  </CardText>
                </Card>
              </Column>
            </Container>

            <Languages />
          </Column>
        </Container>

        <Footer />
      </div>
    )
  }

  private readonly root: React.CSSProperties = {
    width: '100%',
    height: '100%',

    margin: 0,
    padding: 0
  }

  private readonly hero: React.CSSProperties = {
    color: this.context.muiTheme.palette.alternateTextColor,
    backgroundColor: this.context.muiTheme.palette.primary1Color,
    position: 'relative'
  }

  private readonly h1: React.CSSProperties = {
    ...heading.styles.get(heading.Types.H1),
    margin: '0 0 12px 0'
  }

  private readonly h2: React.CSSProperties = heading.styles.get(heading.Types.H2)
  private readonly img: React.CSSProperties = {
    borderRadius: '50%',
    margin: '0 0 6% 0'
  }

  public static readonly contextTypes = {
    muiTheme: PropTypes.object.isRequired
  }
}
