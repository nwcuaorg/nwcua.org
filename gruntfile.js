
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        watch: {
            js: {
                files: ['js/src/*.js','js/lib/*.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
                files: ['css/src/*.scss'],
                tasks: ['sass','autoprefixer'],
                options: {
                    spawn: false
                }
            }
        },


        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                files: {
                    'js/main.js': [
                        'node_modules/reframe.js/dist/jquery.reframe.',
                        'node_modules/magnific-popup/dist/jquery.magnific-popup.js',
                        'js/lib/*.js',
                        'js/src/*.js',
                    ]
                }
            },
            options: {
                sourceMap: true,
                sourceMapName: 'js/main.js.map'
            }
        },


        // we use the Sass
        sass: {
            dist: {
                options: {
                    // nested, compact, compressed, expanded
                    style: 'compressed'
                },
                files: {
                    'css/src/main-unprefixed.css': 'css/src/main.scss',
                    'css/micro.css': 'css/src/micro.scss',
                    'css/micro-merger.css': 'css/src/micro-merger.scss',
                }
            }
        },


        // auto-prefix our css3 properties.
        autoprefixer: {
            files: {
                dest: 'css/main.css',
                src: 'css/src/main-unprefixed.css'
            }
        }

    });

    // register task
    grunt.registerTask('default', ['watch']);

    // a build task just in case we want to
    grunt.registerTask('build', ['sass','autoprefixer','uglify']);

};

