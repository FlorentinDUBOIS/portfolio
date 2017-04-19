import * as React from 'react'
import * as injectTapEventPlugin from 'react-tap-event-plugin';
import {Provider} from 'react-redux'
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import {Route} from 'react-router'
import {ConnectedRouter, routerReducer, routerMiddleware} from 'react-router-redux'
import {createBrowserHistory} from 'history'
import {createStore, combineReducers, compose, applyMiddleware} from 'redux'
import getMuiTheme from 'material-ui/styles/getMuiTheme'

import {redux} from '../tools'
import {IState} from '../store'
import {intl} from '../reducers'
import {Layout} from '.'
import {mui} from '../config'

// Needed for onTouchTap
// http://stackoverflow.com/a/34015469/988941
injectTapEventPlugin();

const history = createBrowserHistory()
const middleware = routerMiddleware(history)
const store = createStore<IState>(
  combineReducers({
    intl: intl.reducer,
    router: routerReducer
  }),

  applyMiddleware(middleware),
  compose(redux.DevTools.instrument())
)


export namespace Root {
  export interface Props {}
  export interface State {}
}

export class Root extends React.Component<Root.Props, Root.State> {
  public render() {
    return (
      <Provider store={store}>
        <MuiThemeProvider muiTheme={getMuiTheme(mui.theme)}>
          <ConnectedRouter history={history}>
            <div>
              <Route path="/" component={Layout}>

              </Route>

              <redux.DevTools />
            </div>
          </ConnectedRouter>
        </MuiThemeProvider>
      </Provider>
    )
  }
}
