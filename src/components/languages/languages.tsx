import * as React from 'react'
import * as PropTypes from 'prop-types'
import { Subscription } from 'rxjs'

import { token } from '../../configs/github'
import { GenericProps } from '../generic-props'
import { Context } from '../context'
import { fromReduxStore } from '../../helpers/rx'
import { IRepository } from '../../helpers/github/IRepository'
import { ILanguage } from '../../helpers/github/ILanguage'
import * as github from '../../store/github'
import { Container } from '../container/container'
import { Language } from '../language/language'

interface State {
  languages: github.Language[]
}

export class Languages extends React.Component<GenericProps, State> {
  public constructor(props: GenericProps, context: Context) {
    super(props, context)

    this.fetch = this.fetch.bind(this)
    this.state = {
      languages: []
    }
  }

  public async componentDidMount() {
    const { store }: Context = this.context

    await this.fetch()

    this.subscription = fromReduxStore(store)
      .subscribe(({ github }) => {
        this.setState({
          languages: github.languages
        })
      })
  }

  public componentWillUnmount() {
    this.subscription.unsubscribe()
  }

  public async fetch() {
    const { store }: Context = this.context
    const response = await fetch('https://api.github.com/users/FlorentinDUBOIS/repos', {
      headers: {
        Authorization: `token ${ token }`
      }
    })

    const repositories = await response.json()

    repositories.forEach(async (repository: IRepository) => {
      const response = await fetch(repository.languages_url, {
        headers: {
          Authorization: `token ${ token }`
        }
      })

      const languages: ILanguage = await response.json()

      for (const language in languages) {
        store.dispatch({
          type: github.Types.ADD_LANGUAGE,
          language: {
            name: language,
            line: languages[language]
          }
        })
      }
    })
  }

  public render() {
    const { languages } = this.state
    const total = languages.reduce<number>((acc, language) => acc += language.line, 0)

    return (
      <Container>
        { languages.map(({ name, line }, index) => <Language key={ index } name={ name } line={ line } total={ total } />) }
      </Container>
    )
  }

  private subscription: Subscription
  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
