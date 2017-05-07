import * as redux from 'redux'

export enum Types {
  HIDE = '@@tchat/HIDE' as any,
  DISPLAY = '@@tchat/DISPLAY' as any
}

export interface Action extends redux.Action {
  type: Types
}

export interface State {
  hidden: boolean
}

export function reducer(state: State = { hidden: true }, { type }: Action): State {
  if (type === Types.DISPLAY) {
    state.hidden = false
  } else if (type === Types.HIDE) {
    state.hidden = true
  }

  return state
}
