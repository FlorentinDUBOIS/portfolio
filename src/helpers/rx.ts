import {Store} from 'redux'
import {Observable, Observer} from 'rxjs'

export namespace rx {
  export function toObservable<T>(store: Store<T>): Observable<T> {
    return Observable.create(function (observer: Observer<T>) {
      store.subscribe(function () {
        observer.next(store.getState())
      })
    })
  }
}
