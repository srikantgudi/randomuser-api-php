<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        td {
            padding: 0.5rem;
        }
        tbody > tr:nth-child(even) {
            background-color: #dedede;
        }
    </style>
    @livewireStyles
</head>
<body class="my-4 w-2/3 mx-auto">
    <main>
        {{$slot}}
    </main>

    @livewireScripts
</body>
</html>
