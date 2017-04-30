import * as redux from 'redux'
import { ApiAiClient } from 'api-ai-javascript'

import { store } from '.'
import { token } from '../configs/ai'
import { Ai } from '../helpers/dexie/ai'

export enum Types {
  POST_MESSAGE = '@@ai/POST_MESSAGE' as any,
  GET_ANSWER = '@@ai/GET_ANSWER' as any
}

export interface Action extends redux.Action {
  type: Types
  message: string
}

export interface Message {
  id?: number
  answer: boolean
  message: string
}

export interface State {
  messages: Message[]
}

const ai: ApiAiClient = new ApiAiClient({
  accessToken: token
})

const db = new Ai()

export async function reducer(state: State = { messages: [] }, { message, type }: Action): Promise<State> {
  if (state instanceof Promise) {
    state = await state
  }

  if (!state.messages.length) {
    try {
      state.messages = await db.messages.toArray() || []
    } catch (e) { }
  }

  if (type === Types.POST_MESSAGE) {
    state.messages.push({ message, answer: false })
    db.messages.put({ message, answer: false })

    try {
      const response: any = await ai.textRequest(message)

      store.dispatch({
        type: Types.GET_ANSWER,
        message: response.result.fulfillment.speech
      })
    } catch (e) { }
  } else if (type === Types.GET_ANSWER) {
    state.messages.push({ message, answer: true })
    db.messages.put({ message, answer: true })
  }

  console.log("reducer", state)

  return state
}
