import * as React from 'react'
import { Provider } from 'react-redux'
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider'
import getMuiTheme from 'material-ui/styles/getMuiTheme'
import { ConnectedRouter } from 'react-router-redux'
import { Route } from 'react-router'

import { store, history } from '../store'
import { Layout } from './layout/layout'
import { theme } from '../configs/theme'

export function Root() {
  return (
    <Provider store={ store }>
      <MuiThemeProvider muiTheme={ getMuiTheme(theme) }>
        <ConnectedRouter history={ history }>
          <div>
            <Route path="/" component={ Layout } />
          </div>
        </ConnectedRouter>
      </MuiThemeProvider>
    </Provider>
  )
}
