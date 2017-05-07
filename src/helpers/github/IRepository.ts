import { IOnwer } from './IOwner'

export interface IRepository {
  id: number
  name: string
  full_name: string
  owner: IOnwer,
  languages_url: string
}
