import {Store} from 'redux'

import {IState} from '../store'

export interface IContext {
  store?: Store<IState>
  theme?: __MaterialUI.Styles.MuiTheme
}
