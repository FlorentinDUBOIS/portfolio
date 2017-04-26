import * as redux from 'redux'
import { ApiAiClient } from 'api-ai-javascript'

import { store } from '.'
import { token } from '../configs/ai'

export enum Types {
  POST_MESSAGE = '@@ai/POST_MESSAGE' as any,
  GET_ANSWER = '@@ai/GET_ANSWER' as any
}

export interface Action extends redux.Action {
  type: Types
  message: string
}

export interface Message {
  answer: boolean
  message: string
}

export interface State {
  messages: Message[]
}

const ai: ApiAiClient = new ApiAiClient({
  accessToken: token
})

export function reducer(state: State = { messages: [] }, { message, type }: Action): State {
  if (type === Types.POST_MESSAGE) {
    state.messages.push({
      message,
      answer: false
    })

    ai
      .textRequest(message)
      .catch(() => {})
      .then((response: any) => {
        store.dispatch({
          type: Types.GET_ANSWER,
          message: response.result.fulfillment.speech
        })
      })

  } else if (type === Types.GET_ANSWER) {
    state.messages.push({
      message,
      answer: true
    })
  }

  return state
}
