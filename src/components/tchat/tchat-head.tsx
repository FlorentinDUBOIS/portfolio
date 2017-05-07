import * as React from 'react'
import * as PropTypes from 'prop-types'
import { fade } from 'material-ui/utils/colorManipulator'
import { darkBlack, white } from 'material-ui/styles/colors'
import CloseIcon from 'material-ui/svg-icons/navigation/close'

import { GenericProps } from '../generic-props'
import { Context } from '../context'
import { Translate } from '../translate/translate'
import { Types } from '../../store/tchat'

export class TchatHead extends React.Component<GenericProps, void> {
  public render() {
    const { store }: Context = this.context
    const type = Types.HIDE

    return (
      <div style={ this.style } >
        <Translate name='tchat.head' />
        <span style={{ flex: 1 }} ></span>
        <CloseIcon onClick={ () => store.dispatch({ type }) } style={{ color: 'white', cursor: 'pointer' }} />
      </div>
    )
  }

  private readonly style: React.CSSProperties = {
    display: 'flex',

    alignItems: 'center',
    flexDirection: 'row',

    width: 'calc(100% - 20px)',
    padding: 10,

    backgroundColor: fade(darkBlack, 0.7),
    color: white
  }

  public static readonly contextTypes = {
    store: PropTypes.object.isRequired
  }
}
