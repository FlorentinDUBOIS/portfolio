import * as React from 'react'
import RaisedButton from 'material-ui/RaisedButton'
import { white } from 'material-ui/styles/colors'

import { Translate } from '../translate/translate'
import { ResumeContainer } from './resume-container'
import { GenericProps } from '../generic-props'

export class Resume extends React.Component<GenericProps, void> {
  public render() {
    return (
      <ResumeContainer>
        <Translate name="resume.get" style={ this.translate } />

        <RaisedButton
            buttonStyle={ this.button }
            secondary={ true }
            label={ <Translate name="resume.download" /> }
            labelPosition="before"
            icon={ <i className="material-icons">file_download</i> }
          />
      </ResumeContainer>
    )
  }

  private button: React.CSSProperties = {
    color: white
  }

  private translate: React.CSSProperties = {
    marginRight: 30
  }
}
