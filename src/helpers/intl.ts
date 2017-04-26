import { Store } from 'redux'

import { State } from '../store'

export function translate(store: Store<State>, name: string): string {
  const state = store.getState()
  const { currentLanguage, fallbackLanguage, translations } = state.intl

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
