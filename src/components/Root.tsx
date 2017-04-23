import * as React from 'react'
import * as injectTapEventPlugin from 'react-tap-event-plugin';
import {Provider} from 'react-redux'
import {Route} from 'react-router'
import {ConnectedRouter} from 'react-router-redux'
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import getMuiTheme from 'material-ui/styles/getMuiTheme'

import {redux} from '../tools'
import {Layout} from '.'
import {mui} from '../config'
import {history, store} from '../store'

// Needed for onTouchTap
// http://stackoverflow.com/a/34015469/988941
injectTapEventPlugin();


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
