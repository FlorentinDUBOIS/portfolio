// Define an interface for i18n
export interface IIntl {
  translations: Map<string, Map<string, string>>
  currentLanguage: string
  fallbackLanguage: string
}
