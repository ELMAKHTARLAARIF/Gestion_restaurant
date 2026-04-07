<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Snack YAssine | Restaurant Gastronomique</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
  <script src="{{asset('js/home.js')}}" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gold: '#C8A96E',
            'gold-h': '#d4b87c',
            dark: '#0B0B0B',
            s1: '#111111',
            s2: '#161616',
            s3: '#1C1C1C',
            cream: '#F5F0E8',
            muted: '#8A7E6E',
            cgreen: '#6EC88A',
            cred: '#C86E6E',
          },
          fontFamily: {
            display: ['"Cormorant Garamond"', 'serif'],
            body: ['Jost', 'sans-serif'],
          },
        }
      }
    }
  </script>

</head>

<body class="bg-dark text-cream overflow-x-hidden">
