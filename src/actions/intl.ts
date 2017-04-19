import {Action} from 'redux'

export namespace intl {
  export enum EAction {
    CHANGE_CURRENT_LANGUAGE,
    CHANGE_FALLBACK_LANGUAGE
  }

  export interface IAction extends Action {
    type: EAction
    language: string
  }
}
