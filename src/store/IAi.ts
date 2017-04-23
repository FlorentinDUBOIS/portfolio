export interface IMessage {
  answer: boolean
  message: string
}

export interface IAi {
  messages: IMessage[]
}
