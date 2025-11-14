@extends('layouts.app')

@section('content')
    <!-- Chat Section -->
    <div class="col-lg-8 chat-container" style="border-right: 2px solid var(--border-highlight);">
        <!-- Header -->
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center"
            style="background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%); border-color: var(--border-highlight) !important; box-shadow: 0 2px 8px var(--shadow-sm);">
            <div>
                <h5 class="mb-0"
                    style="color: var(--accent-primary); font-weight: 700; text-shadow: 0 2px 4px rgba(255, 107, 157, 0.3);">
                    💬 Yuki-chan
                </h5>
                <small style="color: var(--text-secondary); font-weight: 500;">✨ Asisten laptop kawaii kamu~ ♡</small>
            </div>
            <form method="POST" action="{{ route('chat.clear') }}" class="d-inline">
                @csrf
                <button class="btn btn-sm" type="submit"
                    style="background: linear-gradient(135deg, #dc2626, #991b1b); color: #ffffff; border: none; font-weight: 600; box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);">
                    <i class="bi bi-trash"></i> Clear Chat
                </button>
            </form>
        </div>

        <!-- Chat Messages -->
        <div id="chat-box" class="chat-messages p-3" style="background: var(--pastel-bg);">
            @if(count($messages) === 0)
                <div class="text-center mt-5" style="color: var(--text-secondary);">
                    <div style="font-size: 4rem; filter: drop-shadow(0 4px 8px rgba(255, 107, 157, 0.3));">🌸</div>
                    <p class="mt-3" style="font-size: 1.1rem; font-weight: 600; color: var(--text-primary);">
                        Hai! Aku Yuki-chan~ Mau tanya tentang laptop apa nih? (◕‿◕✿)
                    </p>
                </div>
            @endif
            @foreach($messages as $index => $msg)
                <div class="mb-3 d-flex {{ $msg['role'] === 'user' ? 'justify-content-end' : 'justify-content-start' }}">
                    <div style="max-width: 70%;">
                        @if($msg['role'] === 'user')
                            <div class="rounded-3 p-3 shadow-sm"
                                style="background: var(--user-bg); color: var(--user-text); box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);">
                                <div class="markdown-content" style="font-weight: 500;">{{ $msg['content'] }}</div>
                            </div>
                            <small class="d-block text-end mt-1" style="color: var(--text-muted); font-weight: 600;">Kamu</small>
                        @else
                            <div class="rounded-3 p-3 shadow-sm"
                                style="background: var(--ai-bg); border: 2px solid var(--ai-border); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge"
                                        style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); color: white; font-weight: 600; padding: 0.4rem 0.8rem; font-size: 0.85rem; box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);">
                                        🌸 Yuki-chan
                                    </span>
                                </div>
                                <div class="markdown-content" id="ai-msg-{{ $index }}" style="color: var(--ai-text);">
                                    {{ $msg['content'] }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Input Form -->
        <div class="p-3 border-top"
            style="background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%); border-color: var(--border-highlight) !important; box-shadow: 0 -2px 8px var(--shadow-sm);">
            <form id="chat-form">
                @csrf
                <div class="input-group">
                    <input type="text" id="message-input" name="message" class="form-control form-control-lg"
                        style="background: var(--pastel-tertiary); color: var(--text-primary); border: 2px solid var(--border-highlight); font-weight: 500;"
                        placeholder="Ketik pesanmu disini~ (｡♥‿♥｡)" required autofocus>
                    <button class="btn btn-lg px-4" type="submit"
                        style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); color: white; border: none; font-weight: 700; box-shadow: 0 4px 12px rgba(255, 107, 157, 0.4);">
                        <i class="bi bi-send-fill"></i> Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Products Sidebar -->
    <div class="col-lg-4 products-sidebar" style="background: var(--pastel-secondary);">
        <div class="p-3 border-bottom"
            style="background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%); border-color: var(--border-highlight) !important; box-shadow: 0 2px 8px var(--shadow-sm);">
            <h5 class="mb-0"
                style="color: var(--accent-tertiary); font-weight: 700; text-shadow: 0 2px 4px rgba(96, 165, 250, 0.3);">
                💻 Katalog Laptop
            </h5>
            <small style="color: var(--text-secondary); font-weight: 600;">
                ✨ {{ count($products) }} laptop keren tersedia!
            </small>
        </div>
        <div class="products-list">
            <div class="list-group list-group-flush">
                @foreach($products as $product)
                    <div class="list-group-item border"
                        style="background: var(--pastel-tertiary); color: var(--text-primary); border-color: var(--border-highlight) !important; margin-bottom: 0.5rem; transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1" style="color: var(--text-primary); font-weight: 700; font-size: 1rem;">
                                    {{ $product->name }}
                                </h6>
                                <div class="small mb-2">
                                    <span class="badge"
                                        style="background: linear-gradient(135deg, var(--accent-secondary), var(--accent-tertiary)); color: white; font-weight: 600; padding: 0.35rem 0.7rem;">
                                        {{ $product->brand }}
                                    </span>
                                </div>
                                <div class="small mb-1"
                                    style="color: var(--text-secondary); line-height: 1.8; font-weight: 500;">
                                    <i class="bi bi-cpu" style="color: var(--pastel-blue);"></i> {{ $product->processor }}<br>
                                    <i class="bi bi-memory" style="color: var(--pastel-mint);"></i> {{ $product->ram }} |
                                    {{ $product->storage }}<br>
                                    <i class="bi bi-gpu-card" style="color: var(--pastel-peach);"></i> {{ $product->gpu }}<br>
                                    <i class="bi bi-display" style="color: var(--pastel-lavender);"></i> {{ $product->screen }}
                                </div>
                                <div class="fw-bold mt-2"
                                    style="color: var(--accent-primary); font-size: 1.1rem; text-shadow: 0 2px 4px rgba(255, 107, 157, 0.2);">
                                    💰 Rp{{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        // Auto scroll to bottom
        function scrollToBottom() {
            const chatBox = document.getElementById('chat-box');
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }

        // Render markdown for specific element
        function renderMarkdown(element) {
            if (element && element.id && element.id.startsWith('ai-msg-')) {
                const markdownText = element.textContent;
                element.innerHTML = marked.parse(markdownText);
            }
        }

        // Render all markdown on page load
        function renderAllMarkdown() {
            const aiMessages = document.querySelectorAll('.markdown-content');
            aiMessages.forEach(function (el) {
                renderMarkdown(el);
            });
        }

        // Add message to chat UI
        function addMessageToChat(role, content, index) {
            const chatBox = document.getElementById('chat-box');
            const messageDiv = document.createElement('div');
            messageDiv.className = `mb-3 d-flex ${role === 'user' ? 'justify-content-end' : 'justify-content-start'}`;

            if (role === 'user') {
                messageDiv.innerHTML = `
                                        <div style="max-width: 70%;">
                                            <div class="rounded-3 p-3 shadow-sm"
                                                style="background: var(--user-bg); color: var(--user-text); box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);">
                                                <div class="markdown-content" style="font-weight: 500;">${content}</div>
                                            </div>
                                            <small class="d-block text-end mt-1" style="color: var(--text-muted); font-weight: 600;">Kamu</small>
                                        </div>
                                    `;
            } else {
                messageDiv.innerHTML = `
                                        <div style="max-width: 70%;">
                                            <div class="rounded-3 p-3 shadow-sm"
                                                style="background: var(--ai-bg); border: 2px solid var(--ai-border); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="badge" style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); color: white; font-weight: 600; padding: 0.4rem 0.8rem; font-size: 0.85rem; box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);">🌸 Yuki-chan</span>
                                                </div>
                                                <div class="markdown-content" id="ai-msg-${index}" style="color: var(--ai-text);">${content}</div>
                                            </div>
                                        </div>
                                    `;
            }

            chatBox.appendChild(messageDiv);

            // Render markdown for AI messages
            if (role === 'ai') {
                const aiElement = document.getElementById(`ai-msg-${index}`);
                renderMarkdown(aiElement);
            }

            scrollToBottom();
        }

        // Add loading animation to chat
        function addLoadingMessage() {
            const chatBox = document.getElementById('chat-box');
            const loadingDiv = document.createElement('div');
            loadingDiv.id = 'loading-message';
            loadingDiv.className = 'mb-3 d-flex justify-content-start';
            loadingDiv.innerHTML = `
                                    <div style="max-width: 70%;">
                                        <div class="rounded-3 p-3 shadow-sm"
                                            style="background: var(--ai-bg); border: 2px solid var(--ai-border); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="badge" style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); color: white; font-weight: 600; padding: 0.4rem 0.8rem; font-size: 0.85rem; box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);">🌸 Yuki-chan</span>
                                            </div>
                                            <div style="color: var(--text-primary);">
                                                <div class="typing-indicator">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
            chatBox.appendChild(loadingDiv);
            scrollToBottom();
        }

        function removeLoadingMessage() {
            const loadingMsg = document.getElementById('loading-message');
            if (loadingMsg) {
                loadingMsg.remove();
            }
        }

        // AJAX form submission
        document.addEventListener('DOMContentLoaded', function () {
            renderAllMarkdown();
            setTimeout(scrollToBottom, 100);

            const chatForm = document.getElementById('chat-form');
            const messageInput = document.getElementById('message-input');

            chatForm.addEventListener('submit', async function (e) {
                e.preventDefault();

                const message = messageInput.value.trim();
                if (!message) return;

                // Disable input
                messageInput.disabled = true;
                const submitBtn = chatForm.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';

                // Add user message to UI
                addMessageToChat('user', message, Date.now());

                // Clear input
                messageInput.value = '';

                // Add loading animation
                addLoadingMessage();

                try {
                    const response = await fetch('{{ route('chat.send') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ message: message })
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    // Remove loading animation
                    removeLoadingMessage();

                    if (data.success) {
                        // Add AI response to UI
                        addMessageToChat('ai', data.reply, data.index);
                    } else {
                        addMessageToChat('ai', 'Yahhh maaf banget nih... aku lagi error (╥﹏╥) Coba tanya lagi nanti ya? Gomen ne~ 🙏✨', Date.now());
                    }
                } catch (error) {
                    console.error('Error:', error);
                    removeLoadingMessage();
                    addMessageToChat('ai', 'Yahhh maaf banget nih... aku lagi error (╥﹏╥) Coba tanya lagi nanti ya? Gomen ne~ 🙏✨', Date.now());
                } finally {
                    // Re-enable input
                    messageInput.disabled = false;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="bi bi-send-fill"></i> Kirim';
                    messageInput.focus();
                }
            });
        });
    </script>
@endsection