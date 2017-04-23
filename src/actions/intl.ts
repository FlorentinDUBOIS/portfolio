import {Action} from 'redux'

export namespace intl {
  export enum EAction {
    CHANGE_CURRENT_LANGUAGE = '@@intl/CHANGE_CURRENT_LANGUAGE' as any,
    CHANGE_FALLBACK_LANGUAGE = '@@intl/CHANGE_FALLBACK_LANGUAGE' as any
  }

  export interface IAction extends Action {
    type: EAction
    language: string
  }
}
