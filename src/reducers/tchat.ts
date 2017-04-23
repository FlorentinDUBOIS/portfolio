import {tchat as actions} from '../actions'
import {ITchat} from '../store'

export namespace tchat {
  export function reducer(state: ITchat = { hide: true }, action: actions.IAction) {
    if (action.type === actions.EAction.DISPLAY) {
      state.hide = false
    } else if (action.type === actions.EAction.HIDE) {
      state.hide = true
    }

    return state
  }
}
