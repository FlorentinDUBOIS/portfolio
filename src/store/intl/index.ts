import * as redux from 'redux'

import { translations as en } from './en'

export enum Types {
  CHANGE_CURRENT_LANGUAGE = '@@intl/CHANGE_CURRENT_LANGUAGE' as any,
  CHANGE_FALLBACK_LANGUAGE = '@@intl/CHANGE_FALLBACK_LANGUAGE' as any
}

export enum Languages {
  ENGLISH = 'en' as any
}

export interface Action extends redux.Action {
  type: Types
  language: Languages
}

export interface State {
  translations: Map<Languages, Map<string, string>>
  currentLanguage: Languages
  fallbackLanguage: Languages
}

export const translations = new Map<Languages, Map<string, string>>()

translations.set(Languages.ENGLISH, en)

export function reducer(state: State = void 0, action: Action): State {
  if (state === void 0) {
    state = {
      translations,
      currentLanguage: navigator.language.substr(0, 2) as any || Languages.ENGLISH,
      fallbackLanguage: Languages.ENGLISH
    }
  }

  if (action.type === Types.CHANGE_CURRENT_LANGUAGE) {
    state.currentLanguage = action.language
  } else if (action.type === Types.CHANGE_FALLBACK_LANGUAGE) {
    state.fallbackLanguage = action.language
  }

  return state
}
