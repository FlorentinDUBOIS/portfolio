import {Action} from 'redux'

export namespace tchat {
  export enum EAction {
    DISPLAY = '@@tchat/DISPLAY' as any,
    HIDE = '@@tchat/HIDE' as any
  }

  export interface IAction extends Action {
    type: EAction
  }
}
