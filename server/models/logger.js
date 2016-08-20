// ----------------------------------------------------------------------------
// requirements
const printit = require( 'printit' );
const winston = require( 'winston' );

// ----------------------------------------------------------------------------
// class
class Logger {
    constructor( name, date = false ) {
        let print = printit({
            prefix: name,
            date: date
        });

        this.logger = new winston.Logger({
            transports: [{
                log: ( level, message ) => {
                    print[level]( message );
                }
            }]
        });

        let levels = [
            'info',
            'warn',
            'error',
            'debug'
        ];

        for( let level of levels ) {
            this[level] = (( level ) => {
                return ( message ) => {
                    this.logger.log( level, message );
                };
            })( level );
        }
    }

    log( level, message ) {
        this.logger.log( level, message );
    }
}

// ----------------------------------------------------------------------------
// exports
module.exports = Logger;
