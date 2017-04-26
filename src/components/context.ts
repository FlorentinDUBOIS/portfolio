import { Store } from 'redux'

import { State } from '../store'

export interface Context {
  muiTheme?: __MaterialUI.Styles.MuiTheme
  store?: Store<State>
}
