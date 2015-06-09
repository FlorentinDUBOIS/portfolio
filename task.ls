#!/usr/bin/env lsc

require! 'commander'
require! 'shelljs'

const url = 'http://localhost/~florentin/framework/'

commander.usage '[options] [command]'
    .version 'Version 0.0.1'

commander.option '-h, --help', 'show information about this command', !->
    commander.outputHelp!

commander.command 'do [tasks...]'
    .description 'execute task given by the framework'
    .action ( tasks ) !->
        for task in tasks
            shelljs.exec 'curl -sL ' + url + '?task=' + task, {
                async: true
                silent: true
            }, ( code, output ) !->
                console.log( output )

commander.parse process.argv
