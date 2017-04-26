import {Store} from 'redux'
import {Observable, Observer} from 'rxjs'

export function fromReduxStore<T>(store: Store<T>): Observable<T> {
  return Observable.create(function (observer: Observer<T>) {
    store.subscribe(function () {
      observer.next(store.getState())
    })
  })
}
