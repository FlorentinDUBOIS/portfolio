export * from './IState'
export * from './IIntl'
export * from './ITchat'
export * from './IAi'

import {createBrowserHistory} from 'history'
import {createStore, combineReducers, compose, applyMiddleware} from 'redux'
import {routerMiddleware, routerReducer} from 'react-router-redux'

import {IState} from './IState'
import {ai, intl, tchat} from '../reducers'
import {redux} from '../tools'

export const history = createBrowserHistory()
const middleware = routerMiddleware(history)

export const store = createStore<IState>(
  combineReducers({
    ai: ai.reducer,
    intl: intl.reducer,
    tchat: tchat.reducer,
    router: routerReducer
  }),

  applyMiddleware(middleware),
  compose(redux.DevTools.instrument())
)
