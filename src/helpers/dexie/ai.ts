import Dexie from 'dexie'

import { Message } from '../../store/ai'

export class Ai extends Dexie {

  public constructor() {
    super('Ai')

    this.version(1).stores({
      messages: '++id, answer, message'
    })
  }

  public messages: Dexie.Table<Message, number>
}
