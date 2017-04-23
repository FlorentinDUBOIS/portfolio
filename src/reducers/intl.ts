import * as actions from '../actions'
import init from '../intl'
import {IIntl} from '../store'

export namespace intl {
  export function reducer(state: IIntl = init, action: actions.intl.IAction): IIntl {
    if (action.type === actions.intl.EAction.CHANGE_CURRENT_LANGUAGE) {
      state.currentLanguage = action.language
    } else if (action.type === actions.intl.EAction.CHANGE_FALLBACK_LANGUAGE) {
      state.fallbackLanguage = action.language
    }

    return state
  }
}
