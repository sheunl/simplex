<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ config('app.name', 'Blog') }}</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                                {{ $article->created_at->format('F j, Y') }}
                            </time>
                            <span>•</span>
                            <span>{{ $article->name }}</span>
                        </div>
                        
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">
                            {{ $article->title }}
                        </h2>
                        
                        <div class="prose prose-sm text-gray-600 mb-4 line-clamp-3">
                            {!! Str::limit(strip_tags($article->content), 150) !!}
                        </div>

                        @if($article->tags)
                            <div class="flex flex-wrap gap-2 mt-4">
                                @foreach(explode(',', $article->tags) as $tag)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="text-center text-gray-500 text-sm">
                © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>