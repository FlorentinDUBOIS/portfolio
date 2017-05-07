import * as React from 'react'
import ActionCode from 'material-ui/svg-icons/action/code'
import { white, red500, lightBlue400 } from 'material-ui/styles/colors'

import { ReactIcon } from '../../components/icons/ReactIcon'
import { LoveIcon } from '../../components/icons/LoveIcon'

export const translations = new Map<string, string>()

translations.set('me.name', 'Florentin DUBOIS')
translations.set('me.status', 'French IT student engineer')
translations.set('me.job', (
  <span>Intership as IT technician at <a href="//www.groupe-sii.com">SII Ouest</a> working on improve life of people using a great power that is <i className="material-icons">code</i> wrote with <img src="assets/images/heart.svg" /></span>
) as any)

translations.set('tchat.head', 'Portfolio AI')

translations.set('resume.get', 'Get my resume')
translations.set('resume.download', 'Download')

translations.set('me.as.frontend.developer.head', 'Front-end developments')
translations.set('me.as.frontend.developer.subhead', 'Awesome stuffs to use and see')
translations.set('me.as.frontend.developer.text', (
  <div className="text">

  </div>
) as any)

translations.set('me.as.backend.developer.head', 'Back-end developments')
translations.set('me.as.backend.developer.subhead', 'Micro-service and API, made with loves')
translations.set('me.as.backend.developer.text', (
  <div className="text">

  </div>
) as any)

translations.set('me.as.ops.head', 'Ops developments')
translations.set('me.as.ops.subhead', 'Automation power, never let you down')
translations.set('me.as.ops.text', (
  <div className="text">

  </div>
) as any)

translations.set('footer.code', (
  <p style={{ display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '1rem' }}>
    <ActionCode style={{ color: white, margin: 10, width: 32, height: 32 }} />
    <span>with</span>
    <LoveIcon style={{ color: red500, margin: 10, width: 32, height: 32 }} />
    <span>using</span>
    <ReactIcon style={{ color: lightBlue400, margin: 10, width: 32, height: 32 }} />
  </p>
) as any)

translations.set('footer.copyright', '© 2017 - Florentin Dubois')
