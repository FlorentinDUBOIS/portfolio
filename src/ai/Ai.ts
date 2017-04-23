import {ai as cfg} from '../config'
import {ApiAiClient} from "api-ai-javascript/ApiAiClient"

export namespace ai {
  export class Ai {

    public constructor() {
      this.api = new ApiAiClient({
        accessToken: window.atob(cfg.token)
      })
    }

    public answer(question: string) {
      return this.api.textRequest(question)
    }

    private api: ApiAiClient
  }
}
