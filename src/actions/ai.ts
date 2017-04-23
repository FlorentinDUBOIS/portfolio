import {Action} from 'redux'

export namespace ai {
  export enum EAction {
    ANSWER = '@@ai/ANSWER' as any,
    QUESTION = '@@ai/QUESTION' as any
  }

  export interface IAction extends Action {
    type: EAction
    message: string
  }
}
