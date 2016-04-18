export function merge(...args) {
    let attributes = [];
    for( let argument of args ) {
        switch( typeof( argument )) {
            case 'string': {
                for( let element of argument.split( ' ' )) {
                    attributes.push( element );
                }

                break;
            }

            case 'object': {
                for( let element of argument ) {
                    attributes.push( element );
                }

                break;
            }

            case 'number': {
                attributes.push( argument );

                break;
            }
        }
    }

    return attributes;
}

export function prefix(...args) {
    let attributes = [];

    for( let argument of args.slice( 1 )) {
        switch( typeof( argument )) {
            case 'string': {
                for( let element of argument.split( ' ' )) {
                    attributes.push( `${ args[0] }${ element }` );
                }

                break;
            }

            case 'object': {
                for( let element of argument ) {
                    attributes.push( `${ args[0] }${ element }` );
                }

                break;
            }

            case 'number': {
                attributes.push( `${ args[0] }${ argument }` );

                break;
            }
        }
    }

    return attributes;
}

export function suffix(...args) {
    let attributes = [];

    for( let argument of args.slice( 1 )) {
        switch( typeof( argument )) {
            case 'string': {
                for( let element of argument.split( ' ' )) {
                    attributes.push( `${ element }${ args[0] }` );
                }

                break;
            }

            case 'object': {
                for( let element of argument ) {
                    attributes.push( `${ element }${ args[0] }` );
                }

                break;
            }

            case 'number': {
                attributes.push( `${ argument }${ args[0] }` );

                break;
            }
        }
    }

    return attributes;
}

export function contain( needle, haystack ) {
    for( let value of haystack ) {
        if( value == needle ) {
            return true;            
        }
    }
    
    return false;
}

export function remove( object, properties ) {
    let o = {};
    
    for( let method in object ) {
        if( !contain( method, properties )) {
            o[method] = object[method];
        }
    }
    
    return o;
}

export function append( object, giver ) {
    for( let i in giver ) {
        object[i] = giver[i];
    }

    return object;
}
