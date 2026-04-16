<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Commandes | La Maison Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/Admin/order.css') }}" rel="stylesheet">
    <script src="{{ asset('js/Admin/order.js') }}" ></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C8A96E',
                        gh: '#d4b87c',
                        gd: 'rgba(200,169,110,0.10)',
                        ink: '#0B0B0B',
                        s1: '#111111',
                        s2: '#161616',
                        s3: '#1C1C1C',
                        s4: '#222222',
                        cream: '#F5F0E8',
                        sage: '#6EC88A',
                        rose: '#C86E6E',
                        sky: '#6E9EC8',
                        amber: '#D4A843',
                        lav: '#A87EC8',
                        mint: '#6EC8B4',
                    },
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'serif'],
                        body: ['Jost', 'sans-serif'],
                    },
                    keyframes: {
                        fu: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(14px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        fi: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        pop: {
                            '0%': {
                                opacity: '0',
                                transform: 'scale(.94) translateY(8px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'scale(1) translateY(0)'
                            }
                        },
                        p2: {
                            '0%,100%': {
                                opacity: '1'
                            },
                            '50%': {
                                opacity: '.3'
                            }
                        },
                        sh: {
                            '0%': {
                                backgroundPosition: '200% center'
                            },
                            '100%': {
                                backgroundPosition: '-200% center'
                            }
                        },
                        'slide-in-r': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateX(28px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateX(0)'
                            }
                        },
                        'slide-in-up': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        'count': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(6px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                    },
                    animation: {
                        'fu': 'fu .5s ease both',
                        'fu2': 'fu .5s ease both .08s',
                        'fu3': 'fu .5s ease both .16s',
                        'fu4': 'fu .5s ease both .24s',
                        'fi': 'fi .4s ease both',
                        'pop': 'pop .32s ease both',
                        'p2': 'p2 1.8s infinite',
                        'sh': 'sh 3s linear infinite',
                        'sir': 'slide-in-r .4s ease both',
                        'siu': 'slide-in-up .35s ease both',
                    }
                }
            }
        }
    </script>

</head>