import {translations as en} from './en'
import {translations as fr} from './fr'
import {IIntl} from '../store'

// Create a mapper language => translations
const translations = new Map<string, Map<string, string>>();

// Append languages
translations.set('en', en)
translations.set('fr', fr)


// export default data
export default {
  translations,
  currentLanguage: navigator.language.substring(0, 2) || 'en',
  fallbackLanguage: 'en'
} as IIntl
