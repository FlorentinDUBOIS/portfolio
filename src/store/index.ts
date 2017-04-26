import { Store, createStore, combineReducers, applyMiddleware } from 'redux'
import { routerMiddleware, routerReducer, RouterState } from 'react-router-redux'
import createBrowserHistory from 'history/createBrowserHistory'

import * as intl from './intl'
import * as ai from './ai'
import * as tchat from './tchat'

export interface State {
  ai?: ai.State
  intl?: intl.State
  tchat?: tchat.State
  router?: RouterState
}

export const history = createBrowserHistory()
export const middleware = routerMiddleware(history)
export const store: Store<State> = createStore(
  combineReducers({
    ai: ai.reducer,
    intl: intl.reducer,
    tchat: tchat.reducer,
    router: routerReducer
  }),

  applyMiddleware(middleware)
)
