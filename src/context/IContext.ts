import {Store} from 'redux'

import {IState} from '../store'

export interface IContext {
  store?: Store<IState>
  muiTheme?: __MaterialUI.Styles.MuiTheme
}
