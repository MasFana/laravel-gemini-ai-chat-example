<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Laptop Mbak YUKI </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Improved high-contrast color palette with better hierarchy */
            --pastel-bg: #1a1a1a;
            --pastel-secondary: #242424;
            --pastel-tertiary: #2e2e2e;

            /* Accent colors - vibrant and distinct */
            --accent-primary: #ff6b9d;
            --accent-secondary: #a78bfa;
            --accent-tertiary: #60a5fa;

            /* Text colors - high contrast */
            --text-primary: #f5f5f5;
            --text-secondary: #d1d5db;
            --text-muted: #9ca3af;

            /* UI element colors */
            --pastel-lavender: #c4b5fd;
            --pastel-pink: #fda4af;
            --pastel-blue: #93c5fd;
            --pastel-mint: #86efac;
            --pastel-peach: #fdba74;

            /* Border and shadow */
            --border-color: #3f3f46;
            --border-highlight: #52525b;
            --shadow-sm: rgba(0, 0, 0, 0.3);
            --shadow-md: rgba(0, 0, 0, 0.5);

            /* User message colors */
            --user-bg: linear-gradient(135deg, #ec4899, #8b5cf6);
            --user-text: #ffffff;

            /* AI message colors */
            --ai-bg: #2e2e2e;
            --ai-border: #52525b;
            --ai-text: #f5f5f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
            background-color: var(--pastel-bg);
            font-family: 'Nunito', sans-serif;
        }

        .app-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        .navbar {
            flex-shrink: 0;
            background: linear-gradient(135deg, #2a1f3d 0%, #1a1a2e 100%) !important;
            border-bottom: 3px solid var(--accent-primary);
            box-shadow: 0 4px 12px var(--shadow-md);
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary) !important;
            text-shadow: 0 2px 4px var(--shadow-sm);
        }

        .main-content {
            flex: 1;
            overflow: hidden;
            display: flex;
        }

        .markdown-content h1,
        .markdown-content h2,
        .markdown-content h3 {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            color: var(--accent-primary);
            font-weight: 700;
        }

        .markdown-content h1 {
            font-size: 1.5rem;
        }

        .markdown-content h2 {
            font-size: 1.25rem;
        }

        .markdown-content h3 {
            font-size: 1.1rem;
        }

        .markdown-content ul,
        .markdown-content ol {
            padding-left: 1.5rem;
        }

        .markdown-content code {
            background: rgba(168, 139, 250, 0.15);
            color: var(--pastel-lavender);
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.9em;
            font-family: 'Courier New', monospace;
            border: 1px solid rgba(168, 139, 250, 0.3);
        }

        .markdown-content pre {
            background: #1e1e1e;
            padding: 1rem;
            border-radius: 8px;
            overflow-x: auto;
            border: 2px solid var(--border-highlight);
        }

        .markdown-content pre code {
            background: none;
            padding: 0;
            color: var(--text-primary);
            border: none;
        }

        .markdown-content blockquote {
            border-left: 4px solid var(--accent-secondary);
            padding-left: 1rem;
            margin-left: 0;
            color: var(--text-secondary);
            background: rgba(167, 139, 250, 0.05);
            padding: 0.75rem 1rem;
            border-radius: 0 6px 6px 0;
        }

        .markdown-content p {
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            line-height: 1.6;
        }

        .markdown-content strong {
            color: var(--accent-tertiary);
            font-weight: 700;
        }

        .markdown-content ul li,
        .markdown-content ol li {
            margin-bottom: 0.25rem;
            color: var(--text-primary);
        }

        .chat-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .products-sidebar {
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .products-list {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Custom scrollbar with gradient */
        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: var(--pastel-secondary);
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--accent-primary), var(--accent-secondary));
            border-radius: 6px;
            border: 2px solid var(--pastel-secondary);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #ff85b3, #b89fff);
            box-shadow: 0 0 8px rgba(255, 107, 157, 0.5);
        }

        /* Typing indicator animation - enhanced */
        .typing-indicator {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 0;
        }

        .typing-indicator span {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            animation: typing 1.4s infinite;
            opacity: 0.7;
            box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);
        }

        .typing-indicator span:nth-child(1) {
            animation-delay: 0s;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {

            0%,
            60%,
            100% {
                transform: translateY(0);
                opacity: 0.5;
            }

            30% {
                transform: translateY(-12px);
                opacity: 1;
                box-shadow: 0 4px 12px rgba(255, 107, 157, 0.6);
            }
        }

        /* Button styles */
        .btn {
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow-sm);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Product card hover effect */
        .list-group-item {
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            transform: translateX(4px);
            border-color: var(--accent-primary) !important;
            box-shadow: -4px 0 12px rgba(255, 107, 157, 0.3);
        }

        /* Input focus effect */
        .form-control:focus {
            border-color: var(--accent-primary) !important;
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 157, 0.25) !important;
            background-color: var(--pastel-bg) !important;
        }

        /* Badge pulse animation */
        @keyframes badgePulse {

            0%,
            100% {
                box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);
            }

            50% {
                box-shadow: 0 4px 12px rgba(255, 107, 157, 0.6);
            }
        }

        .badge {
            animation: badgePulse 2s ease-in-out infinite;
        }
    </style>
</head>

<body>
    <div class="app-container">
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"
                    style="color: var(--text-primary); font-weight: 700; font-size: 1.25rem; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                    <i class="bi bi-laptop" style="color: var(--accent-primary);"></i>
                    <span
                        style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        Laptop Kawaii Kuudere
                    </span> ✨
                </a>
            </div>
        </nav>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>