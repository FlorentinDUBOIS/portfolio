import * as redux from 'redux'

export enum Types {
  ADD_LANGUAGE = '@@github/ADD_LANGUAGE' as any
}

export interface Language {
  name: string
  line: number
}

export interface Action extends redux.Action {
  type: Types
  language: Language
}

export interface State {
  languages: Language[]
}

export function reducer(state: State = { languages: [] }, { type, language }: Action): State {
  if (type === Types.ADD_LANGUAGE) {
    if (state.languages.find(val => val.name === language.name)) {
      state.languages.map(val => {
        if (val.name === language.name) {
          val.line += language.line
        }

        return val
      })
    } else {
      state.languages.push(language)
    }

    state.languages.sort((a, b) => {
      if (a.line > b.line) {
        return -1
      } else if (a.line < b.line) {
        return 1
      } else {
        return 0
      }
    })
  }

  return state
}
