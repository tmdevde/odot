const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        spinner: (theme) => ({
          default: {
            color: theme('colors.lightblack.500', 'lightblack'), // color you want to make the spinner
            size: '1em', // size of the spinner (used for both width and height)
            border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
            speed: '500ms', // the speed at which the spinner should rotate
          },
          light: {
            color: theme('colors.white.500', 'white'), // color you want to make the spinner
            size: '1em', // size of the spinner (used for both width and height)
            border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
            speed: '500ms', // the speed at which the spinner should rotate
          },
          // md: {
          //   color: theme('colors.red.500', 'red'),
          //   size: '2em',
          //   border: '2px',
          //   speed: '500ms',
          // },
        }),
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'white': {
                    100: '#FFFFFF',
                    200: '#FFFFFF',
                    300: '#FFFFFF',
                    400: '#FFFFFF',
                    500: '#FFFFFF',
                    600: '#E6E6E6',
                    700: '#999999',
                    800: '#737373',
                    900: '#4D4D4D',
                  },
                  'lightblack': {
                    100: '#EAEAEB',
                    200: '#CBCBCD',
                    300: '#ABACAF',
                    400: '#6C6E74',
                    500: '#2D3038',
                    600: '#292B32',
                    700: '#1B1D22',
                    800: '#141619',
                    900: '#0E0E11',
                  },
                  'blue': {
                    100: '#E6F3FE',
                    200: '#C1E0FD',
                    300: '#9BCEFC',
                    400: '#50A9FA',
                    500: '#0584F8',
                    600: '#0577DF',
                    700: '#034F95',
                    800: '#023B70',
                    900: '#02284A',
                  },
                  'almostwhite': {
                    100: '#FEFEFF',
                    200: '#FCFDFF',
                    300: '#FBFCFE',
                    400: '#F7F9FE',
                    500: '#F4F7FD',
                    600: '#DCDEE4',
                    700: '#929498',
                    800: '#6E6F72',
                    900: '#494A4C',
                  },
                  'green': {
                    100: '#EBF9EB',
                    200: '#CCF1CD',
                    300: '#ADE8AE',
                    400: '#70D772',
                    500: '#33C635',
                    600: '#2EB230',
                    700: '#1F7720',
                    800: '#175918',
                    900: '#0F3B10',
                  },
                  'yellow': {
                    100: '#FFF8E6',
                    200: '#FEEEC2',
                    300: '#FEE49D',
                    400: '#FDCF53',
                    500: '#FCBB09',
                    600: '#E3A808',
                    700: '#977005',
                    800: '#715404',
                    900: '#4C3803',
                  },
                  'purple': {
                    100: '#F3F0FF',
                    200: '#E1DAFF',
                    300: '#CFC4FF',
                    400: '#AC98FE',
                    500: '#886CFE',
                    600: '#7A61E5',
                    700: '#524198',
                    800: '#3D3172',
                    900: '#29204C',
                  },
                  'red': {
                    100: '#FEEAEA',
                    200: '#FCCACA',
                    300: '#F9AAAB',
                    400: '#F56B6B',
                    500: '#F12B2C',
                    600: '#D92728',
                    700: '#911A1A',
                    800: '#6C1314',
                    900: '#480D0D',
                  },
                  'grey': {
                    100: '#F0F1F1',
                    200: '#D9DBDD',
                    300: '#C3C6C9',
                    400: '#959BA0',
                    500: '#687077',
                    600: '#5E656B',
                    700: '#3E4347',
                    800: '#2F3236',
                    900: '#1F2224',
                  },
            }
        },
    },
    variants: {
        spinner: ['responsive'],
    },
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/ui'),
        require('tailwindcss-spinner')(),
    ],
};
