import {translations as en} from './en'
import {translations as fr} from './fr'

// Create a mapper language => translations
const translations = new Map<string, Map<string, string>>();

// Append languages
translations.set('en', en)
translations.set('fr', fr)

// Define an interface for i18n
export interface IIntl {
  translations: Map<string, Map<string, string>>
  currentLanguage: string
  fallbackLanguage: string
}

// export default data
export default {
  translations,
  currentLanguage: navigator.language || 'en',
  fallbackLanguage: 'en'
} as IIntl
