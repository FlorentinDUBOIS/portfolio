import * as redux from 'redux'
import { ApiAiClient, IServerResponse } from 'api-ai-javascript'

import { store } from '.'
import { token } from '../configs/ai'
import { Ai } from '../helpers/dexie/ai'

export enum Types {
  POST_MESSAGE = '@@ai/POST_MESSAGE' as any,
  GET_ANSWER = '@@ai/GET_ANSWER' as any,
  LOAD_MESSAGES = '@@ai/LOAD_MESSAGES' as any
}

export interface Action extends redux.Action {
  type: Types
  message?: string
  messages?: Message[]
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

export async function loadMessages(): Promise<Message[]> {
  let messages: Message[] = []

  try {
    messages = await db.messages.toArray()
  } catch (e) { }

  return messages
}

let firstTime: boolean = true
export function reducer(state: State = { messages: [] }, action: Action): State {
  const { type } = action

  if (firstTime) {
    firstTime = false

    loadMessages()
      .catch(e => { })
      .then((messages: Message[]) => {
        if (messages.length) {
          store.dispatch({
            type: Types.LOAD_MESSAGES,
            messages
          })
        }
      })
  }

  if (type === Types.POST_MESSAGE) {
    const { message } = action

    state.messages.push({ message, answer: false })
    db.messages.put({ message, answer: false })

      ai
        .textRequest(message)
        .catch(e => { })
        .then((response: IServerResponse) => {
          store.dispatch({
            type: Types.GET_ANSWER,
            message: response.result.fulfillment.speech
          })
        })
  } else if (type === Types.GET_ANSWER) {
    const { message } = action

    state.messages.push({ message, answer: true })
    db.messages.put({ message, answer: true })
  } else if (type === Types.LOAD_MESSAGES) {
    const { messages } = action

    state.messages = state
      .messages
      .reverse()
      .concat(messages.reverse())
      .reverse()
  }

  return state
}
