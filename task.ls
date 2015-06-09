#!/usr/bin/env lsc

require! 'commander'
require! 'shelljs'

const url = 'http://localhost/~florentin/framework/'

commander.usage '[options] [command]'
    .version 'Version 0.0.1'

commander.option '-h, --help', 'show information about this command', !->
    commander.outputHelp!

commander.command 'do [tasks...]'
    .description 'execute task given by the framework without argument'
    .action ( tasks ) !->
        for task in tasks
            shelljs.exec 'curl -sL ' + url + '?task=' + task, {
                async: true
                silent: true
            }, ( code, output ) !->
                console.log( output )

commander.command 'exec <task> -- [args...]'
    .description 'execute one task given by the framework with arguments'
    .action ( task, args ) !->
        call = 'curl -sL ' + url + '?task=' + task + ' -d '

        for arg in args
            call += arg + ' -d '

        call .= substr 0, call.length - 4

        console.log( call );

        shelljs.exec call, {
            async: false
            silent: true
        }, ( code, output ) !->
            console.log( output )

commander.parse process.argv
