import {Store} from 'redux'

import {IState} from '../store'

export namespace intl {
  export function translate(store: Store<IState>, name: string): string {
    const state: IState = store.getState()
    const {currentLanguage, fallbackLanguage, translations} = state.intl

    if (translations.has(currentLanguage)) {
      if (translations.get(currentLanguage).has(name)) {
        return translations.get(currentLanguage).get(name)
      }
    } else if (translations.has(fallbackLanguage)) {
      if (translations.get(fallbackLanguage).has(name)) {
        return translations.get(fallbackLanguage).get(name)
      }
    }

    return name
  }
}
