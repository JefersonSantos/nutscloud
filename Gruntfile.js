// AdminLTE Gruntfile
module.exports = function (grunt) { // jshint ignore:line
  'use strict';

  grunt.initConfig({
    pkg   : grunt.file.readJSON('package.json'),
    watch : {
      less : {
        // Compiles less files upon saving
        files: ['construtor/less/*.less'],
        tasks: ['less:development', 'less:production', 'replace', 'notify:less']
      },
      js   : {
        // Compile js files upon saving
        files: ['construtor/js/*.js'],
        tasks: ['js', 'notify:js']
      },
      skins: {
        // Compile any skin less files upon saving
        files: ['construtor/less/skins/*.less'],
        tasks: ['less:skins', 'less:minifiedSkins', 'notify:less']
      }
    },
    // Notify end of tasks
    notify: {
      less: {
        options: {
          title  : 'AdminLTE',
          message: 'LESS finished running'
        }
      },
      js  : {
        options: {
          title  : 'AdminLTE',
          message: 'JS bundler finished running'
        }
      }
    },
    // 'less'-task configuration
    // This task will compile all less files upon saving to create both AdminLTE.css and AdminLTE.min.css
    less  : {
      // Development not compressed
      development  : {
        files: {
          // compilation.css  :  source.less
          'dist/css/AdminLTE.css'                     : 'construtor/less/AdminLTE.less',
          // AdminLTE without plugins
          'dist/css/alt/AdminLTE-without-plugins.css' : 'construtor/less/AdminLTE-without-plugins.less',
          // Separate plugins
          'dist/css/alt/AdminLTE-select2.css'         : 'construtor/less/select2.less',
          'dist/css/alt/AdminLTE-fullcalendar.css'    : 'construtor/less/fullcalendar.less',
          'dist/css/alt/AdminLTE-bootstrap-social.css': 'construtor/less/bootstrap-social.less'
        }
      },
      // Production compressed version
      production   : {
        options: {
          compress: true
        },
        files  : {
          // compilation.css  :  source.less
          'dist/css/AdminLTE.min.css'                     : 'construtor/less/AdminLTE.less',
          // AdminLTE without plugins
          'dist/css/alt/AdminLTE-without-plugins.min.css' : 'construtor/less/AdminLTE-without-plugins.less',
          // Separate plugins
          'dist/css/alt/AdminLTE-select2.min.css'         : 'construtor/less/select2.less',
          'dist/css/alt/AdminLTE-fullcalendar.min.css'    : 'construtor/less/fullcalendar.less',
          'dist/css/alt/AdminLTE-bootstrap-social.min.css': 'construtor/less/bootstrap-social.less'
        }
      },
      // Non minified skin files
      skins        : {
        files: {
          'dist/css/skins/skin-blue.css'        : 'construtor/less/skins/skin-blue.less',
          'dist/css/skins/skin-black.css'       : 'construtor/less/skins/skin-black.less',
          'dist/css/skins/skin-yellow.css'      : 'construtor/less/skins/skin-yellow.less',
          'dist/css/skins/skin-green.css'       : 'construtor/less/skins/skin-green.less',
          'dist/css/skins/skin-red.css'         : 'construtor/less/skins/skin-red.less',
          'dist/css/skins/skin-purple.css'      : 'construtor/less/skins/skin-purple.less',
          'dist/css/skins/skin-blue-light.css'  : 'construtor/less/skins/skin-blue-light.less',
          'dist/css/skins/skin-black-light.css' : 'construtor/less/skins/skin-black-light.less',
          'dist/css/skins/skin-yellow-light.css': 'construtor/less/skins/skin-yellow-light.less',
          'dist/css/skins/skin-green-light.css' : 'construtor/less/skins/skin-green-light.less',
          'dist/css/skins/skin-red-light.css'   : 'construtor/less/skins/skin-red-light.less',
          'dist/css/skins/skin-purple-light.css': 'construtor/less/skins/skin-purple-light.less',
          'dist/css/skins/_all-skins.css'       : 'construtor/less/skins/_all-skins.less'
        }
      },
      // Skins minified
      minifiedSkins: {
        options: {
          compress: true
        },
        files  : {
          'dist/css/skins/skin-blue.min.css'        : 'construtor/less/skins/skin-blue.less',
          'dist/css/skins/skin-black.min.css'       : 'construtor/less/skins/skin-black.less',
          'dist/css/skins/skin-yellow.min.css'      : 'construtor/less/skins/skin-yellow.less',
          'dist/css/skins/skin-green.min.css'       : 'construtor/less/skins/skin-green.less',
          'dist/css/skins/skin-red.min.css'         : 'construtor/less/skins/skin-red.less',
          'dist/css/skins/skin-purple.min.css'      : 'construtor/less/skins/skin-purple.less',
          'dist/css/skins/skin-blue-light.min.css'  : 'construtor/less/skins/skin-blue-light.less',
          'dist/css/skins/skin-black-light.min.css' : 'construtor/less/skins/skin-black-light.less',
          'dist/css/skins/skin-yellow-light.min.css': 'construtor/less/skins/skin-yellow-light.less',
          'dist/css/skins/skin-green-light.min.css' : 'construtor/less/skins/skin-green-light.less',
          'dist/css/skins/skin-red-light.min.css'   : 'construtor/less/skins/skin-red-light.less',
          'dist/css/skins/skin-purple-light.min.css': 'construtor/less/skins/skin-purple-light.less',
          'dist/css/skins/_all-skins.min.css'       : 'construtor/less/skins/_all-skins.less'
        }
      }
    },

    // Uglify task info. Compress the js files.
    uglify: {
      options   : {
        mangle          : true,
        preserveComments: 'some'
      },
      production: {
        files: {
          'dist/js/adminlte.min.js': ['bibliotecas/js/adminlte.js']
        }
      }
    },

    // Concatenate JS Files
    concat: {
      options: {
        separator: '\n\n',
        banner   : '/*! AdminLTE app.js\n'
        + '* ================\n'
        + '* Main JS application file for AdminLTE v2. This file\n'
        + '* should be included in all pages. It controls some layout\n'
        + '* options and implements exclusive AdminLTE plugins.\n'
        + '*\n'
        + '* @Author  Almsaeed Studio\n'
        + '* @Support <https://www.almsaeedstudio.com>\n'
        + '* @Email   <abdullah@almsaeedstudio.com>\n'
        + '* @version <%= pkg.version %>\n'
        + '* @repository <%= pkg.repository.url %>\n'
        + '* @license MIT <http://opensource.org/licenses/MIT>\n'
        + '*/\n\n'
        + '// Make sure jQuery has been loaded\n'
        + 'if (typeof jQuery === \'undefined\') {\n'
        + 'throw new Error(\'AdminLTE requires jQuery\')\n'
        + '}\n\n'
      },
      dist   : {
        src : [
          'construtor/js/BoxRefresh.js',
          'construtor/js/BoxWidget.js',
          'construtor/js/ControlSidebar.js',
          'construtor/js/DirectChat.js',
          'construtor/js/Layout.js',
          'construtor/js/PushMenu.js',
          'construtor/js/TodoList.js',
          'construtor/js/Tree.js'
        ],
        dest: 'bibliotecas/js/adminlte.js'
      }
    },

    // Replace image paths in AdminLTE without plugins
    replace: {
      withoutPlugins   : {
        src         : ['bibliotecas/css/alt/AdminLTE-without-plugins.css'],
        dest        : 'bibliotecas/css/alt/AdminLTE-without-plugins.css',
        replacements: [
          {
            from: '../img',
            to  : '../../img'
          }
        ]
      },
      withoutPluginsMin: {
        src         : ['bibliotecas/css/alt/AdminLTE-without-plugins.min.css'],
        dest        : 'bibliotecas/css/alt/AdminLTE-without-plugins.min.css',
        replacements: [
          {
            from: '../img',
            to  : '../../img'
          }
        ]
      }
    },

    // Build the documentação files
    includes: {
      build: {
        src    : ['*.html'], // Source files
        dest   : 'documentação/', // Destination directory
        flatten: true,
        cwd    : 'documentação/construtor',
        options: {
          silent     : true,
          includePath: 'documentação/construtor/include'
        }
      }
    },

    // Optimize images
    image: {
      dynamic: {
        files: [
          {
            expand: true,
            cwd   : 'construtor/img/',
            src   : ['**/*.{png,jpg,gif,svg,jpeg}'],
            dest  : 'bibliotecas/img/'
          }
        ]
      }
    },

    // Validate JS code
    jshint: {
      options: {
        jshintrc: 'construtor/js/.jshintrc'
      },
      grunt  : {
        options: {
          jshintrc: 'construtor/grunt/.jshintrc'
        },
        src    : 'Gruntfile.js'
      },
      core   : {
        src: 'construtor/js/*.js'
      },
      demo   : {
        src: 'bibliotecas/js/demo.js'
      },
      pages  : {
        src: 'bibliotecas/js/pages/*.js'
      }
    },

    jscs: {
      options: {
        config: 'construtor/js/.jscsrc'
      },
      core   : {
        src: '<%= jshint.core.src %>'
      },
      pages  : {
        src: '<%= jshint.pages.src %>'
      }
    },

    // Validate CSS files
    csslint: {
      options: {
        csslintrc: 'construtor/less/.csslintrc'
      },
      dist   : [
        'bibliotecas/css/AdminLTE.css'
      ]
    },

    // Validate Bootstrap HTML
    bootlint: {
      options: {
        relaxerror: ['W005']
      },
      files  : ['pages/**/*.html', '*.html']
    },

    // Delete images in construtor directory
    // After compressing the images in the construtor/img dir, there is no need
    // for them
    clean: {
      build: ['construtor/img/*']
    }
  });

  // Load all grunt tasks

  // LESS Compiler
  grunt.loadNpmTasks('grunt-contrib-less');
  // Watch File Changes
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Compress JS Files
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Include Files Within HTML
  grunt.loadNpmTasks('grunt-includes');
  // Optimize images
  grunt.loadNpmTasks('grunt-image');
  // Validate JS code
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-jscs');
  // Delete not needed files
  grunt.loadNpmTasks('grunt-contrib-clean');
  // Lint CSS
  grunt.loadNpmTasks('grunt-contrib-csslint');
  // Lint Bootstrap
  grunt.loadNpmTasks('grunt-bootlint');
  // Concatenate JS files
  grunt.loadNpmTasks('grunt-contrib-concat');
  // Notify
  grunt.loadNpmTasks('grunt-notify');
  // Replace
  grunt.loadNpmTasks('grunt-text-replace');

  // Linting task
  grunt.registerTask('lint', ['jshint', 'csslint', 'bootlint']);
  // JS task
  grunt.registerTask('js', ['concat', 'uglify']);
  // CSS Task
  grunt.registerTask('css', ['less:development', 'less:production', 'replace']);

  // The default task (running 'grunt' in console) is 'watch'
  grunt.registerTask('default', ['watch']);
};
