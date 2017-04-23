import {IServerResponse} from 'api-ai-javascript'

import {ai as actions} from '../actions'
import {IAi, IMessage, store} from '../store'
import {ai as helper} from '../ai'

export namespace ai {
  export function reducer(state: IAi = { messages: [] }, action: actions.IAction) {
    const { message } = action

    if (action.type === actions.EAction.ANSWER) {
      state.messages.push({
        answer: true,
        message
      })
    } else if (action.type === actions.EAction.QUESTION) {
      state.messages.push({
        answer: false,
        message
      })

      const ai = new helper.Ai()

      ai.answer(message).then(function(res: any) {
        store.dispatch({
          type: actions.EAction.ANSWER,
          message: res.result.fulfillment.speech
        })
      })
    }

    return state
  }
}
